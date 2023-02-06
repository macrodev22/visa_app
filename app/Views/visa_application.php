<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<?= session()->getFlashdata('error') ?>

<div class="hero-section"></div>
    <div class="login-section d-flex">
        <a class="btn btn-secondary" href="/login/manager">Manager Login</a>
        <a class="btn btn-tertiary" href="/login/admin">Admin Login</a>
        <a class="btn" href="/checkapplication">Applicant Login</a>
    </div>

    <form action="" class="form" enctype="multipart/form-data" method="post">
        <?= csrf_field() ?>
        <h1>Apply for a Ugandan Visa</h1>
        <h2>On Point Visa Consultancy Services LTD</h2>

        <div class="form-top d-flex">
            <div data-details="Nationality" class="active-step"></div>
            <div data-details="Bio data"></div>
            <div data-details="Parents details"></div>
            <div data-details="Documents"></div>
        </div>


        <div class="form-step form-step-active" >
            <div class="form-input-group">
                <label for="ppt-number">Passport number<span class="required">*</span></label>
                <input type="text" name="ppt-number">
                <!-- <div class="errorMsg">Passport number too short</div> -->
            </div>

            <div class="form-input-group">
                <label for="ppt-expiry">Passport expiry date<span class="required">*</span></label>
                <input type="date" name="ppt-expiry">
            </div>

            <div class="form-input-group">
                <label for="nationality">Nationality<span class="required">*</span></label>
                <select name="nationality" id="nation">
                    <option value="" selected disabled>--Choose a nationality--</option>
                </select>
            </div>

            <div class="form-input-group">
                <label for="date-arrival">Date of arrival<span class="required">*</span></label>
                <input type="date" name="date-arrival">
            </div>

            <div class="form-input-group btm-0">
                <div class="d-flex">
                    <a class="btn mr-a" href="/checkapplication">Have ongoing application</a>
                    <a class="btn btn-next" id="js-check-ppt">Next</a>
                </div>
                
            </div>
        </div>

        <div class="form-step" data-details="Visa Type">

            <div class="form-input-group">
                <label for="visa-type">Visa type<span class="required">*</span></label>
                <select name="visa-type" id="visa-type">
                </select>
                <div class="d-flex w-radio">
                    <div class="d-flex">
                        <input type="radio" name="gender" value="m" id="male"><label for="male">Male</label>
                    </div>
                    <div class="d-flex">
                        <input type="radio" name="gender" value="f" id="female"><label for="female">Female</label>
                    </div>
                </div>
            </div>


            <div class="form-input-group">
                <label for="surname">Surname<span class="required">*</span></label>
                <input type="text" name="surname">
            </div>

            <div class="form-input-group">
                <label for="firstname">First name<span class="required">*</span> </label>
                <input type="text" name="firstname">
            </div>

            <div class="form-input-group">
                <label for="middlename">Middle name</label>
                <input type="text" name="middlename">
            </div>

            <div class="form-input-group">
                <label for="d-o-b">Date of birth<span class="required">*</span></label>
                <input type="date" name="d-o-b">
            </div>

            <div class="form-input-group">
                <label for="marital-status">Marital status</label>
                <select name="marital-status" id=""></select>
            </div>

            <div class="form-input-group d-flex">
                <a class="btn btn-prev">Previous</a>
                <a class="btn btn-next">Next</a>
            </div>

        </div>
        <div class="form-step" data-details="Bio data">
            <div class="form-input-group">
                <label for="place-of-birth">Place of birth</label>
                <input type="text" name="place-of-birth">
            </div>

            <div class="form-input-group">
                <label for="father-name">Father's name<span class="required">*</span></label>
                <input type="text" name="father-name">
            </div>
            <div class="form-input-group">
                <label for="mother-name">Mother's name<span class="required">*</span></label>
                <input type="text" name="mother-name">
            </div>
            

            <div class="d-flex">
                <a class="btn btn-prev">Previous</a>
                <a class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step" data-details="Submit">
            <div class="form-input-group">
                <label for="email">Email<span class="required">*</span></label>
                <input type="email" name="email">
            </div>

            <div class="form-input-group">
                <label for="password1">Password<span class="required">*</span></label>
                <input type="password" name="password1">
            </div>

            <div class="form-input-group">
                <label for="password2">Confirm Password<span class="required">*</span></label>
                <input type="password" name="password2">
            </div>

            <div class="form-input-group">
                <label for="ppt-copy">Copy of passport<span class="required">*</span></label>
                <input type="file" name="ppt-copy">
            </div>

            <div class="form-input-group">
                <label for="ppt-photo">Passport size photo<span class="required">*</span></label>
                <input type="file" name="ppt-photo">
            </div>
            <div id="additional-requirements"></div>
            <div class="form-input-group">
                <input type="checkbox" name="acknowledge" id="acknowledge" class="d-ib ">
                <label for="acknowledge" class="d-ib">I acknowledge that the information provided is correct to the best of my knowledge</label>
            </div>

            <div class="form-input-group">
                <a class="btn mr-a btn-tertiary" id="add-applicant">Add person</a>
            </div>

            <div class="form-input-group btm-0">
                <div class="d-flex">
                    <a class="btn btn-prev">Previous</a>
                    <button class="btn mr-a" role="submit">Submit</button>
                </div>
            </div>
        </div>

    </form>


    <script type="text/javascript">
        const vtype = document.getElementById("visa-type");
        <?php helper('retrieve') ?>
        const visas = <?= json_encode(getVisaTypes()) ?>;

        visas?.forEach(visa => {
            const el = document.createElement("option");
            el.value = visa.id;
            if(visa.category === 'Ordinary') el.selected = true;
            mult = visa.multiple_entry === '1' ? " -> Multiple Entry": "";
            el.innerHTML = visa.category + " - $" + visa.fees + mult;
            vtype.appendChild(el);
        });

        //Marital Status
        const maritalStatus = ["Married","Single","Widowed","Divorced","Minor"];
        const msel = document.querySelector('select[name="marital-status"]');
        maritalStatus.forEach(status => {
            const el = document.createElement('option')
            el.value = status
            el.innerHTML = status
            msel.appendChild(el);
        });

        function loadVisaRequirementsByType(id) {
            ajaxUtils.$GET("/api/visa-req/?visaId="+ id, (res)=>{
                
                data = JSON.parse(res.responseText);
                
                additionalReqEl = document.getElementById("additional-requirements");
                additionalReqEl.innerHTML = "";

                data?.forEach(requirement => {
                    el = document.createElement("div");
                    el.className = "form-input-group";
                    elLabel = document.createElement("label");
                    elLabel.innerText = requirement;
     
                    el.appendChild(elLabel);
                    elInput = document.createElement("input");
                    elInput.type="file";
                    elInput.name = requirement?.replaceAll(' ', '');
                    el.appendChild(elInput);
    
                    additionalReqEl.appendChild(el);
                });

            });
        }
        

        document.getElementById("visa-type").addEventListener("change", (e)=>{
            id = e.target.value;
            loadVisaRequirementsByType(id);
        });

    </script>


<?= $this->endSection(); ?>