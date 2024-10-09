<?php
// app/Http/Controllers/EligibilityController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eligibility;
use Illuminate\Support\Facades\Auth;
class EligibilityController extends Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'interested_country' => 'required',
            'purpose_of_travel' => 'required',
            'currently_employed' => 'required|boolean',
            'lungs_infection' => 'required|boolean',
            'physical_mental_disorder' => 'required|boolean',
            'criminal_offence' => 'required|boolean',
            'visa_type' => 'required',
            'live_different_country' => 'required|boolean',
            'have_spouse' => 'required|boolean',
            'earn_monthly' => 'required',
            'traveled_before' => 'required|boolean',
        ]);

        // $eligibility = new Eligibility();
        // $eligibility->user_id = auth()->user()->id;
        // $eligibility->interested_country = $request->interested_country;
        // $eligibility->purpose_of_travel = $request->purpose_of_travel;
        // $eligibility->currently_employed = $request->currently_employed;
        // $eligibility->lungs_infection = $request->lungs_infection;
        // $eligibility->physical_mental_disorder = $request->physical_mental_disorder;
        // $eligibility->criminal_offence = $request->criminal_offence;
        // $eligibility->visa_type = $request->visa_type;
        // $eligibility->live_different_country = $request->live_different_country;
        // $eligibility->have_spouse = $request->have_spouse;
        // $eligibility->earn_monthly = $request->earn_monthly;
        // $eligibility->traveled_before = $request->traveled_before;
        // $eligibility->save();

        // Return success message as toaster notification
        return response()->json(['message' => 'Eligibility form submitted successfully!']);
    }
}
