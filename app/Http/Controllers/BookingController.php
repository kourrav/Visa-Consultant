<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show calendar and available time slots
    public function showCalendar()
    {
        // Fetch available time slots from Outlook calendar using Microsoft Graph API
        $availableSlots = $this->getAvailableTimeSlots();

        // Pass slots to the view
        return view('booking', compact('availableSlots'));
    }

    // Fetch available time slots
    private function getAvailableTimeSlots()
    {
        $client = new Client();
        $accessToken = $this->getAccessToken(); // Get OAuth2 token

        $response = $client->request('GET', 'https://graph.microsoft.com/v1.0/me/calendarview', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'query' => [
                'startDateTime' => '2023-10-01T09:00:00',
                'endDateTime' => '2023-10-01T18:00:00',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Create a booking (save to Outlook calendar)
    public function createBooking(Request $request)
    {
        $client = new Client();
        $accessToken = $this->getAccessToken(); // Get OAuth2 token

        // Prepare booking data
        $eventData = [
            "subject" => "Booked Appointment",
            "start" => [
                "dateTime" => $request->startTime,
                "timeZone" => "UTC"
            ],
            "end" => [
                "dateTime" => $request->endTime,
                "timeZone" => "UTC"
            ],
            "attendees" => [
                [
                    "emailAddress" => [
                        "address" => $request->email,
                        "name" => $request->name,
                    ],
                    "type" => "required"
                ]
            ]
        ];

        // Create event in Outlook calendar using Graph API
        $response = $client->post('https://graph.microsoft.com/v1.0/me/events', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode($eventData),
        ]);

        // Redirect with success message
        return redirect('/booking')->with('success', 'Booking created successfully!');
    }

    // Helper function to get access token for Microsoft Graph API
    private function getAccessToken()
    {
        // Implement OAuth 2.0 logic here to get the access token
    }
}
