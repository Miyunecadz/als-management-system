@extends('layout.navigations')

@section('contents')

    <h3 class="text-center">ALS ENROLMENT</h3>
    <div class="position-relative my-5">
        <div class="progress" style="height: 2px">
            <div id="step1-progress" class="progress-bar" style="width: 33%"></div>
            <div id="step2-progress" class="progress-bar bg-secondary" style="width: 33%"></div>
            <div id="step3-progress" class="progress-bar bg-secondary" style="width: 34%"></div>
        </div>
        <div class="position-absolute d-flex justify-content-around top-0  translate-middle-y col-12 font-poppins-light" style="height: 25px">
            <div id="step1-checkpoint" class="rounded-circle bg-primary text-center text-light" style="width: 25px">
                <span class="">1</span>
                <i class="d-none bi bi-check-lg"></i>
                <i class="d-none bi bi-exclamation-lg"></i>
            </div>
            <div id="step2-checkpoint" class="rounded-circle bg-secondary text-center text-light" style="width: 25px">
                <span class="">2</span>
                <i class="d-none bi bi-check-lg"></i>
                <i class="d-none bi bi-exclamation-lg"></i>
            </div>
            <div id="step3-checkpoint" class="rounded-circle bg-secondary text-center text-light" style="width: 25px">
                <span class="">3</span>
                <i class="d-none bi bi-check-lg"></i>
                <i class="d-none bi bi-exclamation-lg"></i>
            </div>

        </div>
    </div>

    <div class="content m-3 pt-1 font-poppins-regular">
        <form action="#" method="POST">
            <div id="step1-form">
                <h3 class="pb-3">1. PERSONAL DETAILS</h3>
                <div class="row ">
                <span class="font-poppins-light mb-1">
                    Name
                </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Martin">
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Coco">
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Pogi">
                            <label for="middlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="suffix" class="form-control" id="suffix" placeholder="Sr.">
                            <label for="suffix">Suffix</label>
                        </div>
                    </div>
                </div>

                <div class="row ">
                <span class="font-poppins-light mb-1">
                    Address
                </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="street" class="form-control" id="street" placeholder="Enter...">
                            <label for="street">House No./Street/Sitio</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="barangay" class="form-control" id="barangay" placeholder="Enter...">
                            <label for="barangay">Barangay</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="municipality" class="form-control" id="municipality"  placeholder="Enter...">
                            <label for="municipality">Municipality</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="province" class="form-control" id="province"  placeholder="Enter...">
                            <label for="province">Province</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="date" name="birthday" class="form-control" id="birthday"  placeholder="Enter...">
                            <label for="birthday">Birthdate</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="birthplace" class="form-control" id="birthplace"  placeholder="Enter...">
                            <label for="birthplace">Birth Place (Municipality)</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="sex" id="sex" class="form-control">
                                <option value="">-Select-</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="birthday">Sex</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="civilstatus" id="civilstatus" class="form-control">
                                <option value="">-Select-</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widow">Widow/er</option>
                                <option value="separated">Separated</option>
                                <option value="solo">Solo Parent</option>
                            </select>
                            <label for="civilstatus">Civil Status</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="pwd" id="pwd" class="form-control">
                                <option value="">-Select-</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <label for="pwd">PWD</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="religion" class="form-control" id="religion"  placeholder="Enter...">
                            <label for="religion">Religion</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="indigenous" class="form-control" id="indigenous"  placeholder="Enter...">
                            <label for="indigenous">Indigenous People (Specify)</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="mothertongue" class="form-control" id="mothertongue"  placeholder="Enter...">
                            <label for="mothertongue">Mother Tongue</label>
                        </div>
                    </div>
                </div>

                <div class="row">
            <span class="font-poppins-light mb-1">
                Father's Name/Guardian
            </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="flastname" class="form-control" id="flastname" placeholder="Martin">
                            <label for="flastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="ffirstname" class="form-control" id="ffirstname" placeholder="Coco">
                            <label for="ffirstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="fmiddlename" class="form-control" id="fmiddlename" placeholder="Pogi">
                            <label for="fmiddlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="foccupation" class="form-control" id="foccupation" placeholder="Occupation">
                            <label for="foccupation">Occupation</label>
                        </div>
                    </div>
                </div>

                <div class="row">
            <span class="font-poppins-light mb-1">
                Mother's Maiden Name
            </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="mlastname" class="form-control" id="mlastname" placeholder="Martin">
                            <label for="mlastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="mfirstname" class="form-control" id="mfirstname" placeholder="Coco">
                            <label for="mfirstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="mmiddlename" class="form-control" id="mmiddlename" placeholder="Pogi">
                            <label for="mmiddlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="moccupation" class="form-control" id="moccupation" placeholder="Occupation">
                            <label for="moccupation">Occupation</label>
                        </div>
                    </div>
                </div>
            </div>

            <div id="step2-form" class="d-none">
                <h3 class="pb-3">2. EDUCATIONAL INFORMATION</h3>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="lastgrade" id="lastgrade" class="form-control">
                                <option value="">-Select-</option>
                                <option value="K">K</option>
                                <option value="G-1">G-1</option>
                                <option value="G-2">G-2</option>
                                <option value="G-3">G-3</option>
                                <option value="G-4">G-4</option>
                                <option value="G-5">G-5</option>
                                <option value="G-6">G-6</option>
                                <option value="G-7">G-7</option>
                                <option value="G-8">G-8</option>
                                <option value="G-9">G-9</option>
                                <option value="G-10">G-10</option>
                            </select>
                            <label for="lastgrade">Last Grade Level</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select name="dropout" id="dropout" class="form-control">
                                <option value="">-Select-</option>
                                <option value="No school in Barangay">No school in Barangay</option>
                                <option value="School to far from home">School to far from home</option>
                                <option value="Needed to help family">Needed to help family</option>
                                <option value="Unable to pay for miscellaneous and other expenses">
                                    Unable to pay for miscellaneous and other expenses
                                </option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="dropout">Why did you drop out of school? (for OSY only)</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="dropoutother" class="form-control" id="dropoutother" placeholder="Enter..">
                            <label for="dropoutother">Other</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select name="attendedals" id="attendedals" class="form-control">
                                <option value="">-Select-</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <label for="attendedals">Have you attended ALS learning session before?</label>
                        </div>
                    </div>
                    <span class="font-poppins-light mb-1">
                    If yes:
                </span>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="programname" class="form-control" id="programname" placeholder="Enter..">
                            <label for="programname">Name of the Program</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="literacylevel" id="literacylevel" class="form-control">
                                <option value="">-Select-</option>
                                <option value="Basic">Basic</option>
                                <option value="Elem">Elem</option>
                                <option value="Sec">Sec</option>
                                <option value="InfEd">InfEd</option>
                            </select>
                            <label for="literacylevel">Level of Literacy</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="yearattended" class="form-control" id="yearattended" placeholder="Enter..">
                            <label for="yearattended">Year Attended</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="completedprogram" id="completedprogram" class="form-control">
                                <option value="">-Select-</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <label for="completedprogram">Have you completed the program?</label>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="form-floating">
                            <input type="text" name="notcompletedreason" class="form-control" id="notcompletedreason" placeholder="Enter..">
                            <label for="notcompletedreason">If NO, state the reason</label>
                        </div>
                    </div>
                </div>

            </div>

            <div id="step3-form" class="d-none">
                <h3 class="pb-3">3. Accessibility and Availability </h3>

                <div class="row">
                <span class="font-poppins-light mb-1">
                        How far is it from your home to your Learning Center?
                </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="inkms" class="form-control" id="inkms" placeholder="Enter..">
                            <label for="inkms">In Kms</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="inhours" class="form-control" id="inhours" placeholder="Enter..">
                            <label for="inhours">In hours and minutes</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select name="transportationtocenter" id="transportationtocenter" class="form-control">
                                <option value="">-Select-</option>
                                <option value="Walking">Walking</option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Bicycle">Bicycle</option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="transportationtocenter">How do you get from your home to Learning Center</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="othertransportation" class="form-control" id="othertransportation" placeholder="Enter..">
                            <label for="othertransportation">Others(Pls. specify)</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                <span class="font-poppins-light mb-1">
                    When can you attend your Learning Session? What specific time can you be at your Learning Center?
                </span>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionmonday" class="form-control" id="sessionmonday" placeholder="Enter..">
                            <label for="sessionmonday">Monday</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessiontuesday" class="form-control" id="sessiontuesday" placeholder="Enter..">
                            <label for="sessiontuesday">Tuesday</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionwednesday" class="form-control" id="sessionwednesday" placeholder="Enter..">
                            <label for="sessionwednesday">Wednesday</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionthursday" class="form-control" id="sessionthursday" placeholder="Enter..">
                            <label for="sessionthursday">Thursday</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionfriday" class="form-control" id="sessionfriday" placeholder="Enter..">
                            <label for="sessionfriday">Friday</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionsaturday" class="form-control" id="sessionsaturday" placeholder="Enter..">
                            <label for="sessionsaturday">Saturday</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionsunday" class="form-control" id="sessionsunday" placeholder="Enter..">
                            <label for="sessionsunday">Sunday</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="mt-3 d-flex justify-content-end">
            <div id="carousel-control" class="btn-group col-8 col-md-3">
                <div id="prev-carousel" class="btn btn-secondary d-none">
                    Previous
                </div>
                <div id="next-carousel" class="btn btn-primary ">
                    Next
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(function () {
            let current_step = 1
            let step1_form = $('#step1-form')
            let step2_form = $('#step2-form')
            let step3_form = $('#step3-form')
            let step1_checkpoint = $('#step1-checkpoint')
            let step2_checkpoint = $('#step2-checkpoint')
            let step3_checkpoint = $('#step3-checkpoint')
            let step1_progress = $('#step1-progress')
            let step2_progress = $('#step2-progress')
            let step3_progress = $('#step3-progress')
            let carousel_control = $('#carousel-control')
            let next_carousel = $('#next-carousel')
            let prev_carousel = $('#prev-carousel')

            let success = true

            $('#next-carousel').click(() => {
                if(current_step == 1){
                    prev_carousel.removeClass('d-none')
                    carousel_control.removeClass('col-md-6 col-md-3').addClass('col-md-6')
                    step1_form.addClass('d-none')  //remove this if error
                    step2_form.removeClass('d-none') //remove this if error
                    step2_progress.removeClass('bg-secondary').addClass('bg-primary')
                    step2_checkpoint.removeClass('bg-secondary').addClass('bg-primary')
                    step1_checkpoint.find('span').addClass('d-none')
                    if (success) {
                        step1_checkpoint.find('.bi-check-lg').removeClass('d-none')
                        step1_progress.removeClass('bg-danger bg-primary').addClass('bg-primary')
                        step1_checkpoint.find('.bi-exclamation-lg').removeClass('d-none').addClass('d-none')
                    }else {
                        step1_checkpoint.find('.bi-check-lg').removeClass('d-none').addClass('d-none')
                        step1_progress.removeClass('bg-danger bg-primary').addClass('bg-danger')
                        step1_checkpoint.find('.bi-exclamation-lg').removeClass('d-none')
                        step1_checkpoint.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                    }
                    current_step++;
                }else if(current_step == 2){
                    step2_form.addClass('d-none') //Remove this if error
                    step3_form.removeClass('d-none') //Remove this if error
                    step3_progress.removeClass('bg-secondary').addClass('bg-primary')
                    step3_checkpoint.removeClass('bg-secondary').addClass('bg-primary')
                    step2_checkpoint.find('span').addClass('d-none')
                    if (success) {
                        step2_checkpoint.find('.bi-check-lg').removeClass('d-none')
                    }else {
                        step2_checkpoint.find('.bi-check-lg').removeClass('d-none').addClass('d-none')
                        step2_progress.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                        step2_checkpoint.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                        step2_checkpoint.find('.bi-exclamation-lg').removeClass('d-none')
                    }
                    next_carousel.html("Finish")
                    current_step++;
                }else {
                    // Form submit
                }
            })

            $('#prev-carousel').click(() => {
                if(current_step == 2){
                    prev_carousel.removeClass('d-none').addClass('d-none')
                    carousel_control.removeClass('col-md-6').addClass('col-md-3')
                    step1_form.removeClass('d-none')
                    step1_checkpoint.find('span').removeClass('d-none')
                    step1_checkpoint.find('.bi-check-lg').addClass('d-none')
                    step1_checkpoint.find('.bi-exclamation-lg').removeClass('d-none').addClass('d-none')
                    step2_progress.addClass('bg-secondary').removeClass('bg-primary bg-danger')
                    step2_checkpoint.addClass('bg-secondary').removeClass('bg-primary bg-danger')
                    step2_form.addClass('d-none')
                    current_step--;
                }else if(current_step == 3){
                    step2_form.removeClass('d-none')
                    step3_form.addClass('d-none')
                    step3_progress.addClass('bg-secondary').removeClass('bg-primary bg-danger')
                    step3_checkpoint.addClass('bg-secondary').removeClass('bg-primary bg-danger')
                    step2_checkpoint.find('span').removeClass('d-none')
                    step2_checkpoint.find('.bi-check-lg').addClass('d-none')
                    step2_checkpoint.find('.bi-exclamation-lg').removeClass('d-none').addClass('d-none')
                    next_carousel.html("Next")
                    current_step--;
                }
            })
        })
    </script>
    @endpush
@endsection

