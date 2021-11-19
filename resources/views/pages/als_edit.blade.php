@extends('layout.navigations')

@section('contents')

    <h3 class="text-center">ALS EDIT</h3>
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

{{--        {{ dd($student) }}--}}
        <form action="{{ route('students.update', $student->id) }}" method="POST" id="edit_form">
            @csrf
            @method('PUT')
            <div id="step1-form">
                <div class="row mb-2">

                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="date" name="enroldate" class="form-control" id="enroldate" placeholder="" value="{{ $student->enroldate }}"
                                   aria-describedby="enroldate-Validation">
                            <label for="enroldate" >Enroll Date</label>
                            <div id="enroldate-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="lrn" class="form-control" id="lrn" placeholder="LRN"
                                   aria-describedby="lrn-Validation" value="{{ $student->lrn }}">
                            <label for="lrn">LRN (if Available)</label>
                            <div id="lrn-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="pb-3">1. PERSONAL DETAILS</h3>
                <div class="row ">
                <span class="font-poppins-light mb-1">
                    Name
                </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Martin"
                                   aria-describedby="lastname-Validation" value="{{ $student->lastname }}">
                            <label for="lastname">Last Name</label>
                            <div id="lastname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Coco"
                                   aria-describedby="firstname-Validation" value="{{ $student->firstname }}">
                            <label for="firstname">First Name</label>
                            <div id="firstname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Pogi"
                                   aria-describedby="middlename-Validation" value="{{ $student->middlename }}">
                            <label for="middlename">Middle Name</label>
                            <div id="middlename-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="suffix" class="form-control" id="suffix" placeholder="Sr."
                                   aria-describedby="suffix-Validation" value="{{ $student->suffix }}">
                            <label for="suffix">Suffix</label>
                            <div id="suffix-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                <span class="font-poppins-light mb-1">
                    Address
                </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="street" class="form-control" id="street" placeholder="Enter..."
                                   aria-describedby="street-Validation" value="{{ $student->street }}">
                            <label for="street">House No./Street/Sitio</label>
                            <div id="street-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="barangay" class="form-control" id="barangay" placeholder="Enter..."
                                   aria-describedby="barangay-Validation" value="{{ $student->barangay }}">
                            <label for="barangay">Barangay</label>
                            <div id="barangay-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="municipality" class="form-control" id="municipality"  placeholder="Enter..."
                                   aria-describedby="municipality-Validation" value="{{ $student->municipality }}">
                            <label for="municipality">Municipality</label>
                            <div id="municipality-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="province" class="form-control" id="province"  placeholder="Enter..."
                                   aria-describedby="province-Validation" value="{{ $student->province }}">
                            <label for="province">Province</label>
                            <div id="province-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="date" name="birthday" class="form-control" id="birthday"  placeholder="Enter..."
                                   aria-describedby="birthday-Validation" value="{{ $student->birthday }}">
                            <label for="birthday">Birthdate</label>
                            <div id="birthday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="birthplace" class="form-control" id="birthplace"  placeholder="Enter..."
                                   aria-describedby="birthplace-Validation" value="{{ $student->birthplace }}">
                            <label for="birthplace">Birth Place (Municipality)</label>
                            <div id="birthplace-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="sex" id="sex" class="form-control"
                                    aria-describedby="sex-Validation">
                                <option {{ $student->sex === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->sex === 'male' ? 'selected' : '' }} value="male">Male</option>
                                <option {{ $student->sex === 'female' ? 'selected' : '' }} value="female">Female</option>
                            </select>
                            <label for="sex">Sex</label>
                            <div id="sex-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="civilstatus" id="civilstatus" class="form-control"
                                    aria-describedby="civilstatus-Validation">
                                <option {{ $student->civilstatus === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->civilstatus === 'single' ? 'selected' : '' }} value="single">Single</option>
                                <option {{ $student->civilstatus === 'married' ? 'selected' : '' }} value="married">Married</option>
                                <option {{ $student->civilstatus === 'widow' ? 'selected' : '' }} value="widow">Widow/er</option>
                                <option {{ $student->civilstatus === 'separated' ? 'selected' : '' }} value="separated">Separated</option>
                                <option {{ $student->civilstatus === 'solo' ? 'selected' : '' }} value="solo">Solo Parent</option>
                            </select>
                            <label for="civilstatus">Civil Status</label>
                            <div id="civilstatus-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="pwd" id="pwd" class="form-control"
                                    aria-describedby="pwd-Validation">
                                <option {{ $student->pwd === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->pwd === 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                <option {{ $student->pwd === 'No' ? 'selected' : '' }} value="No">No</option>
                            </select>
                            <label for="pwd">PWD</label>
                            <div id="pwd-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="religion" class="form-control" id="religion"  placeholder="Enter..."
                                   aria-describedby="religion-Validation" value="{{ $student->religion }}">
                            <label for="religion">Religion</label>
                            <div id="religion-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="indigenous" class="form-control" id="indigenous"  placeholder="Enter..."
                                   aria-describedby="indigenous-Validation" value="{{ $student->indigenous }}">
                            <label for="indigenous">Indigenous People (Specify)</label>
                            <div id="indigenous-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="mothertongue" class="form-control" id="mothertongue"  placeholder="Enter..."
                                   aria-describedby="mothertongue-Validation" value="{{ $student->mothertongue }}">
                            <label for="mothertongue">Mother Tongue</label>
                            <div id="mothertongue-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
            <span class="font-poppins-light mb-1">
                Father's Name/Guardian
            </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="flastname" class="form-control" id="flastname" placeholder="Martin"
                                   aria-describedby="flastname-Validation" value="{{ $student->flastname }}">
                            <label for="flastname">Last Name</label>
                            <div id="flastname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="ffirstname" class="form-control" id="ffirstname" placeholder="Coco"
                                   aria-describedby="ffirstname-Validation" value="{{ $student->ffirstname }}">
                            <label for="ffirstname">First Name</label>
                            <div id="ffirstname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="fmiddlename" class="form-control" id="fmiddlename" placeholder="Pogi"
                                   aria-describedby="fmiddlename-Validation" value="{{ $student->fmiddlename }}">
                            <label for="fmiddlename">Middle Name</label>
                            <div id="fmiddlename-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="foccupation" class="form-control" id="foccupation" placeholder="Occupation"
                                   aria-describedby="foccupation-Validation" value="{{ $student->foccupation }}">
                            <label for="foccupation">Occupation</label>
                            <div id="foccupation-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
            <span class="font-poppins-light mb-1">
                Mother's Maiden Name
            </span>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="mlastname" class="form-control" id="mlastname" placeholder="Martin"
                                   aria-describedby="mlastname-Validation" value="{{ $student->mlastname }}">
                            <label for="mlastname">Last Name</label>
                            <div id="mlastname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="mfirstname" class="form-control" id="mfirstname" placeholder="Coco"
                                   aria-describedby="mfirstname-Validation" value="{{ $student->mfirstname }}">
                            <label for="mfirstname">First Name</label>
                            <div id="mfirstname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="mmiddlename" class="form-control" id="mmiddlename" placeholder="Pogi"
                                   aria-describedby="mmiddlename-Validation" value="{{ $student->mmiddlename }}">
                            <label for="mmiddlename">Middle Name</label>
                            <div id="mmiddlename-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <input type="text" name="moccupation" class="form-control" id="moccupation" placeholder="Occupation"
                                   aria-describedby="moccupation-Validation" value="{{ $student->moccupation }}">
                            <label for="moccupation">Occupation</label>
                            <div id="moccupation-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="step2-form" class="d-none">
                <h3 class="pb-3">2. EDUCATIONAL INFORMATION</h3>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-floating">
                            <select name="lastgrade" id="lastgrade" class="form-control"
                                    aria-describedby="lastgrade-Validation">
                                <option {{ $student->lastgrade === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->lastgrade === 'K' ? 'selected' : '' }} value="K">K</option>
                                <option {{ $student->lastgrade === 'G-1' ? 'selected' : '' }} value="G-1">G-1</option>
                                <option {{ $student->lastgrade === 'G-2' ? 'selected' : '' }} value="G-2">G-2</option>
                                <option {{ $student->lastgrade === 'G-3' ? 'selected' : '' }} value="G-3">G-3</option>
                                <option {{ $student->lastgrade === 'G-4' ? 'selected' : '' }} value="G-4">G-4</option>
                                <option {{ $student->lastgrade === 'G-5' ? 'selected' : '' }} value="G-5">G-5</option>
                                <option {{ $student->lastgrade === 'G-6' ? 'selected' : '' }} value="G-6">G-6</option>
                                <option {{ $student->lastgrade === 'G-7' ? 'selected' : '' }} value="G-7">G-7</option>
                                <option {{ $student->lastgrade === 'G-8' ? 'selected' : '' }} value="G-8">G-8</option>
                                <option {{ $student->lastgrade === 'G-9' ? 'selected' : '' }} value="G-9">G-9</option>
                                <option {{ $student->lastgrade === 'G-10' ? 'selected' : '' }} value="G-10">G-10</option>
                            </select>
                            <label for="lastgrade">Last Grade Level</label>
                            <div id="lastgrade-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select name="dropout" id="dropout" class="form-control"
                                    aria-describedby="dropout-Validation">
                                <option {{ $student->dropout === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->dropout === 'No school in Barangay' ? 'selected' : '' }} value="No school in Barangay">No school in Barangay</option>
                                <option {{ $student->dropout === 'School to far from home' ? 'selected' : '' }} value="School to far from home">School to far from home</option>
                                <option {{ $student->dropout === 'Needed to help family' ? 'selected' : '' }} value="Needed to help family">Needed to help family</option>
                                <option {{ $student->dropout === 'Unable to pay for miscellaneous and other expenses' ? 'selected' : '' }} value="Unable to pay for miscellaneous and other expenses">
                                    Unable to pay for miscellaneous and other expenses
                                </option>
                                <option {{ $student->dropout === 'Other' ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                            <label for="dropout">Why did you drop out of school? (for OSY only)</label>
                            <div id="dropout-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="dropoutother" class="form-control" id="dropoutother" placeholder="Enter.."
                                   aria-describedby="dropoutother-Validation" value="{{ $student->dropoutother }}">
                            <label for="dropoutother">Other</label>
                            <div id="dropoutother-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select name="attendedals" id="attendedals" class="form-control"
                                    aria-describedby="attendedals-Validation">
                                <option {{ $student->attendedals === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->attendedals === 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                <option {{ $student->attendedals === 'No' ? 'selected' : '' }} value="No">No</option>
                            </select>
                            <label for="attendedals">Have you attended ALS learning session before?</label>
                            <div id="attendedals-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <span class="font-poppins-light mb-1">
                    If yes:
                </span>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="programname" class="form-control" id="programname" placeholder="Enter.."
                                   aria-describedby="programname-Validation" value="{{ $student->programname }}">
                            <label for="programname">Name of the Program</label>
                            <div id="programname-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="literacylevel" id="literacylevel" class="form-control"
                                    aria-describedby="literacylevel-Validation" value="{{ $student->lrn }}">
                                <option {{ $student->literacylevel === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->literacylevel === 'Basic' ? 'selected' : '' }} value="Basic">Basic</option>
                                <option {{ $student->literacylevel === 'Elem' ? 'selected' : '' }} value="Elem">Elem</option>
                                <option {{ $student->literacylevel === 'Sec' ? 'selected' : '' }} value="Sec">Sec</option>
                                <option {{ $student->literacylevel === 'InfEd' ? 'selected' : '' }} value="InfEd">InfEd</option>
                            </select>
                            <label for="literacylevel">Level of Literacy</label>
                            <div id="literacylevel-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="yearattended" class="form-control" id="yearattended" placeholder="Enter.."
                                   aria-describedby="yearattended-Validation" value="{{ $student->yearattended }}">
                            <label for="yearattended">Year Attended</label>
                            <div id="yearattended-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="completedprogram" id="completedprogram" class="form-control"
                                    aria-describedby="completedprogram-Validation">
                                <option {{ $student->completedprogram === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->completedprogram === 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                <option {{ $student->completedprogram === 'No' ? 'selected' : '' }} value="No">No</option>
                            </select>
                            <label for="completedprogram">Have you completed the program?</label>
                            <div id="completedprogram-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="form-floating">
                            <input type="text" name="notcompletedreason" class="form-control" id="notcompletedreason" placeholder="Enter.."
                                   aria-describedby="notcompletedreason-Validation" value="{{ $student->notcompletedreason }}">
                            <label for="notcompletedreason">If NO, state the reason</label>
                            <div id="notcompletedreason-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
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
                            <input type="text" name="inkms" class="form-control" id="inkms" placeholder="Enter.."
                                   aria-describedby="inkms-Validation" value="{{ $student->inkms }}">
                            <label for="inkms">In Kms</label>
                            <div id="inkms-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="inhours" class="form-control" id="inhours" placeholder="Enter.."
                                   aria-describedby="inhours-Validation" value="{{ $student->inhours }}">
                            <label for="inhours">In hours and minutes</label>
                            <div id="inhours-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <select name="transportationtocenter" id="transportationtocenter" class="form-control"
                                    aria-describedby="transportationtocenter-Validation">
                                <option {{ $student->transportationtocenter === '' ? 'selected' : '' }} value="">-Select-</option>
                                <option {{ $student->transportationtocenter === 'Walking' ? 'selected' : '' }} value="Walking">Walking</option>
                                <option {{ $student->transportationtocenter === 'Motorcycle' ? 'selected' : '' }} value="Motorcycle">Motorcycle</option>
                                <option {{ $student->transportationtocenter === 'Bicycle' ? 'selected' : '' }} value="Bicycle">Bicycle</option>
                                <option {{ $student->transportationtocenter === 'Other' ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                            <label for="transportationtocenter">How do you get from your home to Learning Center</label>
                            <div id="transportationtocenter-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="othertransportation" class="form-control" id="othertransportation" placeholder="Enter.."
                                   aria-describedby="othertransportation-Validation" value="{{ $student->othertransportation }}">
                            <label for="othertransportation">Others(Pls. specify)</label>
                            <div id="othertransportation-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <span class="font-poppins-light mb-1">
                    When can you attend your Learning Session? What specific time can you be at your Learning Center?
                </span>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionmonday" class="form-control" id="sessionmonday" placeholder="Enter.."
                                   aria-describedby="sessionmonday-Validation" value="{{ $student->sessionmonday }}">
                            <label for="sessionmonday">Monday</label>
                            <div id="sessionmonday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessiontuesday" class="form-control" id="sessiontuesday" placeholder="Enter.."
                                   aria-describedby="sessiontuesday-Validation" value="{{ $student->sessiontuesday }}">
                            <label for="sessiontuesday">Tuesday</label>
                            <div id="sessiontuesday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionwednesday" class="form-control" id="sessionwednesday" placeholder="Enter.."
                                   aria-describedby="sessionwednesday-Validation" value="{{ $student->sessionwednesday }}">
                            <label for="sessionwednesday">Wednesday</label>
                            <div id="sessionwednesday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionthursday" class="form-control" id="sessionthursday" placeholder="Enter.."
                                   aria-describedby="sessionthursday-Validation" value="{{ $student->sessionthursday }}">
                            <label for="sessionthursday">Thursday</label>
                            <div id="sessionthursday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionfriday" class="form-control" id="sessionfriday" placeholder="Enter.."
                                   aria-describedby="sessionfriday-Validation" value="{{ $student->sessionfriday }}">
                            <label for="sessionfriday">Friday</label>
                            <div id="sessionfriday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionsaturday" class="form-control" id="sessionsaturday" placeholder="Enter.."
                                   aria-describedby="sessionsaturday-Validation" value="{{ $student->sessionsaturday }}">
                            <label for="sessionsaturday">Saturday</label>
                            <div id="sessionsaturday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" name="sessionsunday" class="form-control" id="sessionsunday" placeholder="Enter.."
                                   aria-describedby="sessionsunday-Validation" value="{{ $student->sessionsunday }}">
                            <label for="sessionsunday">Sunday</label>
                            <div id="sessionsunday-Validation" class="invalid-feedback">
                                Please provide a valid input.
                            </div>
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
                let edit_form = $('#edit_form')


                // Input Variables

                let success = true

                $('#next-carousel').click(() => {
                    if(current_step == 1){


                        //STEP 1. PERSONAL
                        let enroldate = $('#enroldate').val()
                        let lrn = $('#lrn').val()
                        let lastname = $('#lastname').val()
                        let firstname = $('#firstname').val()
                        let middlename = $('#middlename').val()
                        let suffix = $('#suffix').val()
                        let street = $('#street').val()
                        let barangay = $('#barangay').val()
                        let municipality = $('#municipality').val()
                        let province = $('#province').val()
                        let birthday = $('#birthday').val()
                        let birthplace = $('#birthplace').val()
                        let sex = $('#sex').val()
                        let civilstatus = $('#civilstatus').val()
                        let pwd = $('#pwd').val()
                        let religion = $('#religion').val()
                        let indigenous = $('#indigenous').val()
                        let mothertongue = $('#mothertongue').val()
                        let flastname = $('#flastname').val()
                        let ffirstname = $('#ffirstname').val()
                        let fmiddlename = $('#fmiddlename').val()
                        let foccupation = $('#foccupation').val()
                        let mlastname = $('#mlastname').val()
                        let mfirstname = $('#mfirstname').val()
                        let mmiddlename = $('#mmiddlename').val()
                        let moccupation = $('#moccupation').val()

                        //RESET FORM VALIDATION
                        step1_form.find('input').removeClass('is-invalid')
                        step1_form.find('select').removeClass('is-invalid')

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('personal_validation') }}',
                            data: {
                                enroldate,
                                lrn,
                                lastname,
                                firstname,
                                middlename,
                                suffix,
                                street,
                                barangay,
                                municipality,
                                province,
                                birthday,
                                birthplace,
                                sex,
                                civilstatus,
                                pwd,
                                religion,
                                indigenous,
                                mothertongue,
                                flastname,
                                ffirstname,
                                fmiddlename,
                                foccupation,
                                mlastname,
                                mfirstname,
                                mmiddlename,
                                moccupation,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function (data) {

                                prev_carousel.removeClass('d-none')
                                carousel_control.removeClass('col-md-6 col-md-3').addClass('col-md-6')
                                step2_progress.removeClass('bg-secondary').addClass('bg-primary')
                                step2_checkpoint.removeClass('bg-secondary').addClass('bg-primary')

                                step1_checkpoint.find('.bi-check-lg').removeClass('d-none')
                                step1_progress.removeClass('bg-danger bg-primary').addClass('bg-primary')
                                step1_checkpoint.find('.bi-exclamation-lg').removeClass('d-none').addClass('d-none')
                                step1_checkpoint.removeClass('bg-secondary bg-primary bg-danger').addClass('bg-primary')
                                step1_checkpoint.find('span').addClass('d-none')


                                step1_form.addClass('d-none')  //remove this if error
                                step2_form.removeClass('d-none') //remove this if error

                                current_step++;
                            },
                            error: function (err) {

                                if (err.status == 422) {
                                    step1_checkpoint.find('.bi-check-lg').removeClass('d-none').addClass('d-none')
                                    step1_progress.removeClass('bg-danger bg-primary').addClass('bg-danger')
                                    step1_checkpoint.find('.bi-exclamation-lg').removeClass('d-none')
                                    step1_checkpoint.removeClass('bg-secondary bg-primary').addClass('bg-danger')

                                    step1_checkpoint.find('span').addClass('d-none')


                                    $.each(err.responseJSON.errors, function (i, error) {
                                        let el = $(document).find('[name="'+i+'"]')
                                        let elvalidate = $(document).find('#'+i+'-Validation')
                                        el.addClass('is-invalid')
                                        elvalidate.html(error)
                                    })
                                }

                            }
                        })
                    }else if(current_step == 2){

                        //STEP 2. EDUCATIONAL
                        let lastgrade = $('#lastgrade').val()
                        let dropout = $('#dropout').val()
                        let dropoutother = $('#dropoutother').val()
                        let attendedals = $('#attendedals').val()
                        let programname = $('#programname').val()
                        let literacylevel = $('#literacylevel').val()
                        let yearattended = $('#yearattended').val()
                        let completedprogram = $('#completedprogram').val()
                        let notcompletedreason = $('#notcompletedreason').val()

                        //RESET FORM VALIDATION
                        step2_form.find('input').removeClass('is-invalid')
                        step2_form.find('select').removeClass('is-invalid')


                        $.ajax({
                            type: 'POST',
                            url: '{{ route('education_validation') }}',
                            data: {
                                lastgrade,
                                dropout,
                                dropoutother,
                                attendedals,
                                programname,
                                literacylevel,
                                yearattended,
                                completedprogram,
                                notcompletedreason,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function (data) {

                                step3_progress.removeClass('bg-secondary').addClass('bg-primary')
                                step3_checkpoint.removeClass('bg-secondary').addClass('bg-primary')

                                step2_checkpoint.find('span').addClass('d-none')
                                step2_checkpoint.find('.bi-check-lg').removeClass('d-none')
                                step2_progress.removeClass('bg-secondary bg-primary bg-danger').addClass('bg-primary')
                                step2_checkpoint.removeClass('bg-secondary bg-primary bg-danger').addClass('bg-primary')

                                step2_form.addClass('d-none') //Remove this if error
                                step3_form.removeClass('d-none') //Remove this if error

                                next_carousel.html("Finish")
                                current_step++;
                            },
                            error: function (err) {
                                if (err.status == 422) {
                                    step2_checkpoint.find('.bi-check-lg').removeClass('d-none').addClass('d-none')
                                    step2_progress.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                                    step2_checkpoint.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                                    step2_checkpoint.find('.bi-exclamation-lg').removeClass('d-none')

                                    step2_checkpoint.find('.bi-check-lg').removeClass('d-none')

                                    console.log(err.responseJSON)

                                    $.each(err.responseJSON.errors, function (i, error) {
                                        let el = $(document).find('[name="'+i+'"]')
                                        let elvalidate = $(document).find('#'+i+'-Validation')
                                        el.addClass('is-invalid')
                                        elvalidate.html(error)
                                    })
                                }

                            }
                        })
                    }else if(current_step == 3){
                        //STEP 3. ACCESSIBILITY
                        let inkms = $('#inkms').val()
                        let inhours = $('#inhours').val()
                        let transportationtocenter = $('#transportationtocenter').val()
                        let othertransportation = $('#othertransportation').val()
                        let sessionmonday = $('#sessionmonday').val()
                        let sessiontuesday = $('#sessiontuesday').val()
                        let sessionwednesday = $('#sessionwednesday').val()
                        let sessionthursday = $('#sessionthursday').val()
                        let sessionfriday = $('#sessionfriday').val()
                        let sessionsaturday = $('#sessionsaturday').val()
                        let sessionsunday = $('#sessionsunday').val()

                        //RESET FORM VALIDATION
                        step3_form.find('input').removeClass('is-invalid')
                        step3_form.find('select').removeClass('is-invalid')

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('accessibility_validation') }}',
                            data: {
                                inkms,
                                inhours,
                                transportationtocenter,
                                othertransportation,
                                sessionmonday,
                                sessiontuesday,
                                sessionwednesday,
                                sessionthursday,
                                sessionfriday,
                                sessionsaturday,
                                sessionsunday,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function (data) {
                                edit_form.submit()
                            },
                            error: function (err) {
                                if (err.status == 422) {
                                    step3_checkpoint.find('.bi-check-lg').removeClass('d-none').addClass('d-none')
                                    step3_progress.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                                    step3_checkpoint.removeClass('bg-secondary bg-primary').addClass('bg-danger')
                                    step3_checkpoint.find('.bi-exclamation-lg').removeClass('d-none')

                                    console.warn(err.responseJSON.errors)

                                    $.each(err.responseJSON.errors, function (i, error) {
                                        let el = $(document).find('[name="'+i+'"]')
                                        let elvalidate = $(document).find('#'+i+'-Validation')
                                        el.addClass('is-invalid')
                                        elvalidate.html(error)
                                    })
                                }

                            }
                        })
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

