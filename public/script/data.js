const nations = [
  { name: 'Afghanistan', code: 'AF' },
  { name: 'Åland Islands', code: 'AX' },
  { name: 'Albania', code: 'AL' },
  { name: 'Algeria', code: 'DZ' },
  { name: 'American Samoa', code: 'AS' },
  { name: 'AndorrA', code: 'AD' },
  { name: 'Angola', code: 'AO' },
  { name: 'Anguilla', code: 'AI' },
  { name: 'Antarctica', code: 'AQ' },
  { name: 'Antigua and Barbuda', code: 'AG' },
  { name: 'Argentina', code: 'AR' },
  { name: 'Armenia', code: 'AM' },
  { name: 'Aruba', code: 'AW' },
  { name: 'Australia', code: 'AU' },
  { name: 'Austria', code: 'AT' },
  { name: 'Azerbaijan', code: 'AZ' },
  { name: 'Bahamas', code: 'BS' },
  { name: 'Bahrain', code: 'BH' },
  { name: 'Bangladesh', code: 'BD' },
  { name: 'Barbados', code: 'BB' },
  { name: 'Belarus', code: 'BY' },
  { name: 'Belgium', code: 'BE' },
  { name: 'Belize', code: 'BZ' },
  { name: 'Benin', code: 'BJ' },
  { name: 'Bermuda', code: 'BM' },
  { name: 'Bhutan', code: 'BT' },
  { name: 'Bolivia', code: 'BO' },
  { name: 'Bosnia and Herzegovina', code: 'BA' },
  { name: 'Botswana', code: 'BW' },
  { name: 'Bouvet Island', code: 'BV' },
  { name: 'Brazil', code: 'BR' },
  { name: 'British Indian Ocean Territory', code: 'IO' },
  { name: 'Brunei Darussalam', code: 'BN' },
  { name: 'Bulgaria', code: 'BG' },
  { name: 'Burkina Faso', code: 'BF' },
  { name: 'Burundi', code: 'BI' },
  { name: 'Cambodia', code: 'KH' },
  { name: 'Cameroon', code: 'CM' },
  { name: 'Canada', code: 'CA' },
  { name: 'Cape Verde', code: 'CV' },
  { name: 'Cayman Islands', code: 'KY' },
  { name: 'Central African Republic', code: 'CF' },
  { name: 'Chad', code: 'TD' },
  { name: 'Chile', code: 'CL' },
  { name: 'China', code: 'CN' },
  { name: 'Christmas Island', code: 'CX' },
  { name: 'Cocos (Keeling) Islands', code: 'CC' },
  { name: 'Colombia', code: 'CO' },
  { name: 'Comoros', code: 'KM' },
  { name: 'Congo', code: 'CG' },
  { name: 'Congo, The Democratic Republic of the', code: 'CD' },
  { name: 'Cook Islands', code: 'CK' },
  { name: 'Costa Rica', code: 'CR' },
  { name: 'Cote D\'Ivoire', code: 'CI' },
  { name: 'Croatia', code: 'HR' },
  { name: 'Cuba', code: 'CU' },
  { name: 'Cyprus', code: 'CY' },
  { name: 'Czech Republic', code: 'CZ' },
  { name: 'Denmark', code: 'DK' },
  { name: 'Djibouti', code: 'DJ' },
  { name: 'Dominica', code: 'DM' },
  { name: 'Dominican Republic', code: 'DO' },
  { name: 'Ecuador', code: 'EC' },
  { name: 'Egypt', code: 'EG' },
  { name: 'El Salvador', code: 'SV' },
  { name: 'Equatorial Guinea', code: 'GQ' },
  { name: 'Eritrea', code: 'ER' },
  { name: 'Estonia', code: 'EE' },
  { name: 'Ethiopia', code: 'ET' },
  { name: 'Falkland Islands (Malvinas)', code: 'FK' },
  { name: 'Faroe Islands', code: 'FO' },
  { name: 'Fiji', code: 'FJ' },
  { name: 'Finland', code: 'FI' },
  { name: 'France', code: 'FR' },
  { name: 'French Guiana', code: 'GF' },
  { name: 'French Polynesia', code: 'PF' },
  { name: 'French Southern Territories', code: 'TF' },
  { name: 'Gabon', code: 'GA' },
  { name: 'Gambia', code: 'GM' },
  { name: 'Georgia', code: 'GE' },
  { name: 'Germany', code: 'DE' },
  { name: 'Ghana', code: 'GH' },
  { name: 'Gibraltar', code: 'GI' },
  { name: 'Greece', code: 'GR' },
  { name: 'Greenland', code: 'GL' },
  { name: 'Grenada', code: 'GD' },
  { name: 'Guadeloupe', code: 'GP' },
  { name: 'Guam', code: 'GU' },
  { name: 'Guatemala', code: 'GT' },
  { name: 'Guernsey', code: 'GG' },
  { name: 'Guinea', code: 'GN' },
  { name: 'Guinea-Bissau', code: 'GW' },
  { name: 'Guyana', code: 'GY' },
  { name: 'Haiti', code: 'HT' },
  { name: 'Heard Island and Mcdonald Islands', code: 'HM' },
  { name: 'Holy See (Vatican City State)', code: 'VA' },
  { name: 'Honduras', code: 'HN' },
  { name: 'Hong Kong', code: 'HK' },
  { name: 'Hungary', code: 'HU' },
  { name: 'Iceland', code: 'IS' },
  { name: 'India', code: 'IN' },
  { name: 'Indonesia', code: 'ID' },
  { name: 'Iran, Islamic Republic Of', code: 'IR' },
  { name: 'Iraq', code: 'IQ' },
  { name: 'Ireland', code: 'IE' },
  { name: 'Isle of Man', code: 'IM' },
  { name: 'Israel', code: 'IL' },
  { name: 'Italy', code: 'IT' },
  { name: 'Jamaica', code: 'JM' },
  { name: 'Japan', code: 'JP' },
  { name: 'Jersey', code: 'JE' },
  { name: 'Jordan', code: 'JO' },
  { name: 'Kazakhstan', code: 'KZ' },
  { name: 'Kenya', code: 'KE' },
  { name: 'Kiribati', code: 'KI' },
  { name: 'Korea, Democratic People\'S Republic of', code: 'KP' },
  { name: 'Korea, Republic of', code: 'KR' },
  { name: 'Kuwait', code: 'KW' },
  { name: 'Kyrgyzstan', code: 'KG' },
  { name: 'Lao People\'S Democratic Republic', code: 'LA' },
  { name: 'Latvia', code: 'LV' },
  { name: 'Lebanon', code: 'LB' },
  { name: 'Lesotho', code: 'LS' },
  { name: 'Liberia', code: 'LR' },
  { name: 'Libyan Arab Jamahiriya', code: 'LY' },
  { name: 'Liechtenstein', code: 'LI' },
  { name: 'Lithuania', code: 'LT' },
  { name: 'Luxembourg', code: 'LU' },
  { name: 'Macao', code: 'MO' },
  { name: 'Macedonia, The Former Yugoslav Republic of', code: 'MK' },
  { name: 'Madagascar', code: 'MG' },
  { name: 'Malawi', code: 'MW' },
  { name: 'Malaysia', code: 'MY' },
  { name: 'Maldives', code: 'MV' },
  { name: 'Mali', code: 'ML' },
  { name: 'Malta', code: 'MT' },
  { name: 'Marshall Islands', code: 'MH' },
  { name: 'Martinique', code: 'MQ' },
  { name: 'Mauritania', code: 'MR' },
  { name: 'Mauritius', code: 'MU' },
  { name: 'Mayotte', code: 'YT' },
  { name: 'Mexico', code: 'MX' },
  { name: 'Micronesia, Federated States of', code: 'FM' },
  { name: 'Moldova, Republic of', code: 'MD' },
  { name: 'Monaco', code: 'MC' },
  { name: 'Mongolia', code: 'MN' },
  { name: 'Montserrat', code: 'MS' },
  { name: 'Morocco', code: 'MA' },
  { name: 'Mozambique', code: 'MZ' },
  { name: 'Myanmar', code: 'MM' },
  { name: 'Namibia', code: 'NA' },
  { name: 'Nauru', code: 'NR' },
  { name: 'Nepal', code: 'NP' },
  { name: 'Netherlands', code: 'NL' },
  { name: 'Netherlands Antilles', code: 'AN' },
  { name: 'New Caledonia', code: 'NC' },
  { name: 'New Zealand', code: 'NZ' },
  { name: 'Nicaragua', code: 'NI' },
  { name: 'Niger', code: 'NE' },
  { name: 'Nigeria', code: 'NG' },
  { name: 'Niue', code: 'NU' },
  { name: 'Norfolk Island', code: 'NF' },
  { name: 'Northern Mariana Islands', code: 'MP' },
  { name: 'Norway', code: 'NO' },
  { name: 'Oman', code: 'OM' },
  { name: 'Pakistan', code: 'PK' },
  { name: 'Palau', code: 'PW' },
  { name: 'Palestinian Territory, Occupied', code: 'PS' },
  { name: 'Panama', code: 'PA' },
  { name: 'Papua New Guinea', code: 'PG' },
  { name: 'Paraguay', code: 'PY' },
  { name: 'Peru', code: 'PE' },
  { name: 'Philippines', code: 'PH' },
  { name: 'Pitcairn', code: 'PN' },
  { name: 'Poland', code: 'PL' },
  { name: 'Portugal', code: 'PT' },
  { name: 'Puerto Rico', code: 'PR' },
  { name: 'Qatar', code: 'QA' },
  { name: 'Reunion', code: 'RE' },
  { name: 'Romania', code: 'RO' },
  { name: 'Russian Federation', code: 'RU' },
  { name: 'RWANDA', code: 'RW' },
  { name: 'Saint Helena', code: 'SH' },
  { name: 'Saint Kitts and Nevis', code: 'KN' },
  { name: 'Saint Lucia', code: 'LC' },
  { name: 'Saint Pierre and Miquelon', code: 'PM' },
  { name: 'Saint Vincent and the Grenadines', code: 'VC' },
  { name: 'Samoa', code: 'WS' },
  { name: 'San Marino', code: 'SM' },
  { name: 'Sao Tome and Principe', code: 'ST' },
  { name: 'Saudi Arabia', code: 'SA' },
  { name: 'Senegal', code: 'SN' },
  { name: 'Serbia and Montenegro', code: 'CS' },
  { name: 'Seychelles', code: 'SC' },
  { name: 'Sierra Leone', code: 'SL' },
  { name: 'Singapore', code: 'SG' },
  { name: 'Slovakia', code: 'SK' },
  { name: 'Slovenia', code: 'SI' },
  { name: 'Solomon Islands', code: 'SB' },
  { name: 'Somalia', code: 'SO' },
  { name: 'South Africa', code: 'ZA' },
  { name: 'South Georgia and the South Sandwich Islands', code: 'GS' },
  { name: 'Spain', code: 'ES' },
  { name: 'Sri Lanka', code: 'LK' },
  { name: 'Sudan', code: 'SD' },
  { name: 'Suriname', code: 'SR' },
  { name: 'Svalbard and Jan Mayen', code: 'SJ' },
  { name: 'Swaziland', code: 'SZ' },
  { name: 'Sweden', code: 'SE' },
  { name: 'Switzerland', code: 'CH' },
  { name: 'Syrian Arab Republic', code: 'SY' },
  { name: 'Taiwan, Province of China', code: 'TW' },
  { name: 'Tajikistan', code: 'TJ' },
  { name: 'Tanzania, United Republic of', code: 'TZ' },
  { name: 'Thailand', code: 'TH' },
  { name: 'Timor-Leste', code: 'TL' },
  { name: 'Togo', code: 'TG' },
  { name: 'Tokelau', code: 'TK' },
  { name: 'Tonga', code: 'TO' },
  { name: 'Trinidad and Tobago', code: 'TT' },
  { name: 'Tunisia', code: 'TN' },
  { name: 'Turkey', code: 'TR' },
  { name: 'Turkmenistan', code: 'TM' },
  { name: 'Turks and Caicos Islands', code: 'TC' },
  { name: 'Tuvalu', code: 'TV' },
  { name: 'Uganda', code: 'UG' },
  { name: 'Ukraine', code: 'UA' },
  { name: 'United Arab Emirates', code: 'AE' },
  { name: 'United Kingdom', code: 'GB' },
  { name: 'United States', code: 'US' },
  { name: 'United States Minor Outlying Islands', code: 'UM' },
  { name: 'Uruguay', code: 'UY' },
  { name: 'Uzbekistan', code: 'UZ' },
  { name: 'Vanuatu', code: 'VU' },
  { name: 'Venezuela', code: 'VE' },
  { name: 'Viet Nam', code: 'VN' },
  { name: 'Virgin Islands, British', code: 'VG' },
  { name: 'Virgin Islands, U.S.', code: 'VI' },
  { name: 'Wallis and Futuna', code: 'WF' },
  { name: 'Western Sahara', code: 'EH' },
  { name: 'Yemen', code: 'YE' },
  { name: 'Zambia', code: 'ZM' },
  { name: 'Zimbabwe', code: 'ZW' }
];

const pptnum = document.querySelector('input[name="ppt-number"]');
// const nationality = document.querySelector('input[name="nationality"]');
const visatype = document.getElementById("visa-type");
const lastname = document.querySelector('input[name="surname"]');
const firstname = document.querySelector('input[name="firstname"]');
const middlename = document.querySelector('input[name="middlename"]');
const datearrival = document.querySelector('input[name="date-arrival"]');
const fathername = document.querySelector('input[name="father-name"]');
const mothername = document.querySelector('input[name="mother-name"]');
const pob = document.querySelector('input[name="place-of-birth"]');
const dob = document.querySelector('input[name="d-o-b"]');
const expirydate = document.querySelector('input[name="ppt-expiry"]');
const email = document.querySelector('input[name="email"]');
const passwd = document.querySelector('input[name="password1"]');
const passwd2 = document.querySelector('input[name="password2"]');

const agree = document.getElementById('acknowledge');

const country = document.getElementById("nation");

nations.forEach(nation => {
  const count = document.createElement("option");
  count.value = nation.code;
  count.innerHTML = nation.name;

  country.appendChild(count);
});

const formSteps = document.querySelectorAll(".form-step");
const formTopSteps = document.querySelectorAll(".form-top div");
const nextBtns = document.querySelectorAll(".btn.btn-next");
const prevBtns = document.querySelectorAll(".btn.btn-prev");

let activeCounter = 0;

nextBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    formSteps[activeCounter].classList.remove("form-step-active");
    formTopSteps[activeCounter].classList.remove("active-step");
    activeCounter++;
    formSteps[activeCounter].classList.add("form-step-active");
    formTopSteps[activeCounter].classList.add("active-step");
  })
});

prevBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    formSteps[activeCounter].classList.remove("form-step-active");
    formTopSteps[activeCounter].classList.remove("active-step");
    activeCounter--;
    formSteps[activeCounter].classList.add("form-step-active");
    formTopSteps[activeCounter].classList.add("active-step");
  })
});

const form = document.querySelector(".form");
form?.addEventListener("submit", e => {
  e.preventDefault();

  validateAll();

})

// Add applicant 
document.querySelector("#add-applicant").addEventListener("click", () => {
  if (validateAll()) {
    //Clear the form.

  }
});



function validateAll() {
  //Remove previos errors if any
  errorEls = form.querySelectorAll(".errorMsg").forEach(erEl => erEl.remove());

  //Validate the form
  elements.forEach(elObj => {

    //Empty error arrays
    elObj.errArr.splice(0)

    //Run checks
    elObj.funcs.forEach(func => {
      func(elObj.el, elObj.errArr);
    });

    //Show errors if they exist
    elObj.errArr.forEach(err => {
      addErrorElement(elObj.el, err);
    })

  });


  //Validate password confirmation
  pwdConfErrs = [];
  validatePasswordConfirmation(passwd2, pwdConfErrs, passwd);
  pwdConfErrs.forEach(err => { addErrorElement(passwd2, err) })


  // alert("Validation to be added")
  //Check if no errors
  formHasErrors = false;
  if (pwdConfErrs.length > 0) formHasErrors = true;
  elements.forEach(elObj => { if (elObj.errArr.length > 0) formHasErrors = true })
  // console.log("length: ", pwdConfErrs.length)

  if (!formHasErrors) {
    //Submit if no errors
    sendData(form);
    // displaySuccessMsg("Application received");      
  }

  displayFormStepErrors();

  if (!formHasErrors) return true
}
//End of validation call


//Validation functions
elements = [
  {
    el: pptnum,
    funcs: [validatePptNum],
    errArr: []
  }
  ,
  {
    el: country,
    funcs: [validateNationality],
    errArr: []
  },

  {
    el: visatype,
    funcs: [],
    errArr: []
  },
  {
    el: lastname,
    funcs: [validateName],
    errArr: []
  },
  {
    el: firstname,
    funcs: [validateName],
    errArr: []
  },
  {
    el: middlename,
    funcs: [validateMiddleName],
    errArr: []
  },
  {
    el: fathername,
    funcs: [validateParentName],
    errArr: []
  },
  {
    el: mothername,
    funcs: [validateParentName],
    errArr: []
  },
  {
    el: email,
    funcs: [validateEmail],
    errArr: []
  },
  {
    el: passwd,
    funcs: [validatePassword],
    errArr: []
  },
  {
    el: expirydate,
    funcs: [validateDate],
    errArr: []
  },
  {
    el: datearrival,
    funcs: [validateDate],
    errArr: []
  },
  {
    el: dob,
    funcs: [validateDate],
    errArr: []
  },
  {
    el: agree,
    funcs: [validateAgree],
    errArr: []
  }
];


function addErrorElement(targetEl, err) {
  const el = document.createElement("div");
  el.classList.add("errorMsg");
  el.innerHTML = err;

  targetEl.parentElement.appendChild(el);
}


function validateName(name, errArr) {
  if (name.value.length == 1) {
    errArr.push("Name is too short");
  }

  if (name?.value == '') errArr.push("Empty names not allowed");

}

function validateMiddleName(mname, errArr) {
  if (mname?.value != '') {
    validateName(mname, errArr);
  }
}

function validatePptNum(pptno, errArr) {
  if (pptno?.value.length <= 5 && pptno?.value != '') errArr.push("Passport number too short")
  if (pptno?.value == '') errArr.push("Please enter passport number")
}

function validateNationality(nat, errArr) {
  if (nat?.value?.length > 2) errArr.push("Invalid nation code");
  if (nat.value == "UG") errArr.push("Ugandan can not apply for Ugandan Visa")
  if (nat.value == '') errArr.push("Please select Nationality")

}

function validateAgree(acknowl, errArr) {
  if (!acknowl.checked) errArr.push("Please agree to terms")
}

function validateParentName(parnameEl, errArr) {
  if (parnameEl.value == '') errArr.push("Parent's name can not be empty")
  if (parnameEl.value?.length <= 5 && parnameEl.value != '') errArr.push("Name is too short")
}

function validatePassword(pwdel, errArr) {
  if (pwdel.value == '') errArr.push("Password is required")
  if (pwdel.value?.length < 8) errArr.push("Minimum password length is 8 characters")
}

function validateEmail(emel, errArr) {
  if (emel.value == '') errArr.push("Email is required")

  var re = /\S+@\S+\.\S+/;
  if (!re.test(emel.value)) errArr.push("Enter a valid email address")

}

function validateDate(del, errArr) {
  if (del.value == '') errArr.push("Date is required")
}


function validatePasswordConfirmation(pcel, errArr, pwel) {
  if (pwel.value != '' && pcel.value != '') {
    if (pcel.value != pwel.value) errArr.push("Passwords do not match")
  }
}



//Function to send data
function sendData(form) {
  const XHR = new XMLHttpRequest();

  // Bind the FormData object and the form element
  const FD = new FormData(form);

  // Define what happens on successful data submission
  XHR.addEventListener("load", (event) => {
    // alert(event.target.responseText);
    console.log(event.target.responseText);
    console.log(event.target)
    if (event.target.status == 403) {
      displaySuccessMsg('This is Not allowed')
    }
    else if (event.target.status == 405) displaySuccessMsg(event.target.statusText);
    else if (event.target.status == 400)
      displaySuccessMsg("Succefully added applicant to application");
  });

  // Define what happens in case of error
  XHR.addEventListener("error", (event) => {
    alert('Oops! Something went wrong.');
  });

  // Set up our request
  XHR.open("POST", "/newapplication/");

  // The data sent is what the user provided in the form
  XHR.send(FD);
}


function displaySuccessMsg(msg) {
  el = document.createElement("div");
  el.classList.add("successMsg");
  el.innerHTML = msg;
  document.querySelector("body").appendChild(el);

  setTimeout(() => { el.remove() }, 3000)
}


//Display error state on steps
function displayFormStepErrors() {
  const formStepsContent = document.querySelectorAll("div.form-step");
  const formStepsTop = document.querySelectorAll(".form-top > div");
  // console.log(formStepsContent, formStepsTop)

  formStepsContent?.forEach((step, index) => {
    formStepsTop[index].classList.remove("has-error");

    if (step.querySelector(".errorMsg")) //Has an error
    {
      formStepsTop[index].classList.add("has-error");
    }
  })
}

// Form steps click events 
(() => {
  const formStepsContent = document.querySelectorAll("div.form-step");
  const formStepsTop = document.querySelectorAll(".form-top > div");

  formStepsTop.forEach((topStep, i) => {
    topStep.addEventListener("click", (e) => {
      // el = e.target;
      // parent = el.parent;
      formStepsContent.forEach((step, j) => {
        step.classList.remove("form-step-active")
        formStepsTop[j].classList.remove("active-step")
      })
      formStepsContent[i].classList.add("form-step-active")
      formStepsTop[i].classList.add("active-step")
    })
  })
})();