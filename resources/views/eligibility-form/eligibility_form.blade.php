<div class="container m5">
    <h2 class="text-center mb-4">Check Visa Eligibility</h2>
    <div class="progress mb-4">
        <div class="eligibility-progress-bar progress-bar bg-primary" id="progressStep1" style="width: 33%">Step 1</div>
        <div class="eligibility-progress-bar progress-bar bg-light" id="progressStep2" style="width: 33%">Step 2</div>
        <div class="eligibility-progress-bar progress-bar bg-light" id="progressStep3" style="width: 33%">Step 3</div>
    </div>

    <form id="eligibilityForm" method="POST" action="{{ route('eligibility.submit') }}"
        class="eligibilityForm p-4 shadow-lg bg-white rounded">
        @csrf
        <div class="eligibility_step active">
            <div class="form-group">
                <label for="interested_country">Which country are you interested in applying to?</label>
                <select class="form-control" id="interested_country" name="interested_country" required>
                    <option value="">--Select Country--</option>
                    <option value="USA">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="Australia">Australia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="purpose_of_travel">Why are you travelling to the country?</label>
                <select class="form-control" id="purpose_of_travel" name="purpose_of_travel" required>
                    <option value="">--Select--</option>
                    <option value="tourism_or_visit">Tourism or Visit</option>
                    <option value="business_or_employment">Business or Employment</option>
                    <option value="study_or_exchange">Study or Exchange</option>
                    <option value="immigrate">Immigrate</option>
                </select>
            </div>
            <div class="form-group">
                <label>Are you currently employed?(includes self employment)</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="currently_employed" id="employed_yes" value="1"
                        required>
                    <label class="form-check-label" for="employed_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="currently_employed" id="employed_no" value="0"
                        required>
                    <label class="form-check-label" for="employed_no">No</label>
                </div>
                <label id="currently_employed-error" class="error invalid-feedback" for="currently_employed"></label>
            </div>
            <div class="form-group">
                <label>With the past 2 years have you or anyone you are close to ever had tuberculosis of
                    the lungs or been in close contact with a person with tuberculosis?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lungs_infection" id="lungs_infection_yes"
                        value="1" required>
                    <label class="form-check-label" for="lungs_infection_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lungs_infection" id="lungs_infection_no"
                        value="0" required>
                    <label class="form-check-label" for="lungs_infection_no">No</label>
                </div>
                <label id="lungs_infection-error" class="error invalid-feedback" for="lungs_infection"></label>
            </div>
            <button type="button" class="btn btn-primary eligibility_nextStep">Next</button>
        </div>

        <div class="eligibility_step">
            <div class="form-group">
                <label for="country">Do you have any physical or mental disorder that would require social and/or health
                    services, other than medication, during your stay in Country?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="physical_mental_disorder" id="disorder_yes"
                        value="1" required>
                    <label class="form-check-label" for="disorder_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="physical_mental_disorder" id="disorder_no"
                        value="0" required>
                    <label class="form-check-label" for="disorder_no">No</label>
                </div>
                <label id="physical_mental_disorder-error" class="error invalid-feedback"
                    for="physical_mental_disorder"></label>
            </div>
            <div class="form-group">
                <label for="country">Have you ever committed, been arrested for, been charged with or convicted of any
                    criminal offence in any country or territory?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="criminal_offence" id="offence_yes" value="1"
                        required>
                    <label class="form-check-label" for="offence_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="criminal_offence" id="offence_no" value="0"
                        required>
                    <label class="form-check-label" for="offence_no">No</label>
                </div>
                <label id="criminal_offence-error" class="error invalid-feedback" for="criminal_offence"></label>
            </div>
            <div class="form-group">
                <label for="visa_type">What is your current country of Citizenship?</label>
                <select class="form-control" id="visa_type" name="visa_type" required>
                    <option value="">--Select Visa Type--</option>
                    <option value="work_visa">Work Visa</option>
                    <option value="student_visa">Student Visa</option>
                    <option value="tourist_visa">Tourist Visa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Do you current live in a different country?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="live_different_country"
                        id="live_different_country_yes" value="1" required>
                    <label class="form-check-label" for="live_different_country_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="live_different_country"
                        id="live_different_country_no" value="0" required>
                    <label class="form-check-label" for="live_different_country_no">No</label>
                </div>
                <label id="live_different_country-error" class="error invalid-feedback"
                    for="live_different_country"></label>
            </div>

            <button type="button" class="btn btn-secondary eligibility_prevStep">Previous</button>
            <button type="button" class="btn btn-primary eligibility_nextStep">Next</button>
        </div>

        <div class="eligibility_step">
            <div class="form-group">
                <label for="country">Do you have spouse?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="have_spouse" id="have_spouse_yes" value="1"
                        required>
                    <label class="form-check-label" for="have_spouse_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="have_spouse" id="have_spouse_no" value="0"
                        required>
                    <label class="form-check-label" for="have_spouse_no">No</label>
                </div>
                <label id="have_spouse-error" class="error invalid-feedback" for="have_spouse"></label>
            </div>
            <div class="form-group">
                <label for="country">How much do you earn monthly?(in local currency but prorated to $)</label>
                <select class="form-control" id="earn_monthly" name="earn_monthly" required>
                    <option value="">--Select Earnings--</option>
                    <option value="less_than_500">Less than $500</option>
                    <option value="500_999">$500 to $999</option>
                    <option value="1000_or_more">$1000 or more</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Have you traveled to US/UK/Australia/Canada/India before?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="traveled_before" id="traveled_before_yes"
                        value="1" required>
                    <label class="form-check-label" for="traveled_before_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="traveled_before" id="traveled_before_no"
                        value="0" required>
                    <label class="form-check-label" for="traveled_before_no">No</label>
                </div>
                <label id="traveled_before-error" class="error invalid-feedback" for="traveled_before"></label>
            </div>
            <button type="button" class="btn btn-secondary eligibility_prevStep">Previous</button>
            <button type="submit" class="btn btn-success">Send my visa eligibility report</button>
        </div>
    </form>
    <p class="showsuccess_msg">You are eligible for this role</p>
</div>