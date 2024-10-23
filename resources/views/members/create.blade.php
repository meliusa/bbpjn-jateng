@extends('layouts.app')
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Members / Add Data / </span> Form</h4>

 <!-- Multi Column with Form Separator -->
 <div class="mb-4 card">
    <h5 class="card-header">Multi Column with Form Separator</h5>
    <form class="card-body">
      <h6>1. Account Details</h6>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input type="text" id="multicol-username" class="form-control" placeholder="john.doe" />
            <label for="multicol-username">Username</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input
                type="text"
                id="multicol-email"
                class="form-control"
                placeholder="john.doe"
                aria-label="john.doe"
                aria-describedby="multicol-email2" />
              <label for="multicol-email">Email</label>
            </div>
            <span class="input-group-text" id="multicol-email2">@example.com</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-password-toggle">
            <div class="input-group input-group-merge">
              <div class="form-floating form-floating-outline">
                <input
                  type="password"
                  id="multicol-password"
                  class="form-control"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="multicol-password2" />
                <label for="multicol-password">Password</label>
              </div>
              <span class="cursor-pointer input-group-text" id="multicol-password2"
                ><i class="mdi mdi-eye-off-outline"></i
              ></span>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-password-toggle">
            <div class="input-group input-group-merge">
              <div class="form-floating form-floating-outline">
                <input
                  type="password"
                  id="multicol-confirm-password"
                  class="form-control"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="multicol-confirm-password2" />
                <label for="multicol-confirm-password">Confirm Password</label>
              </div>
              <span class="cursor-pointer input-group-text" id="multicol-confirm-password2"
                ><i class="mdi mdi-eye-off-outline"></i
              ></span>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-4 mx-n4" />
      <h6>2. Personal Info</h6>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input type="text" id="multicol-first-name" class="form-control" placeholder="John" />
            <label for="multicol-first-name">First Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input type="text" id="multicol-last-name" class="form-control" placeholder="Doe" />
            <label for="multicol-last-name">Last Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <select id="multicol-country" class="select2 form-select" data-allow-clear="true">
              <option value="">Select</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select>
            <label for="multicol-country">Country</label>
          </div>
        </div>
        <div class="col-md-6 select2-primary">
          <div class="form-floating form-floating-outline">
            <select id="multicol-language" class="select2 form-select" multiple>
              <option value="en" selected>English</option>
              <option value="fr" selected>French</option>
              <option value="de">German</option>
              <option value="pt">Portuguese</option>
            </select>
            <label for="multicol-language">Language</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input
              type="text"
              id="multicol-birthdate"
              class="form-control dob-picker"
              placeholder="YYYY-MM-DD" />
            <label for="multicol-birthdate">Birth Date</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input
              type="text"
              id="multicol-phone"
              class="form-control phone-mask"
              placeholder="658 799 8941"
              aria-label="658 799 8941" />
            <label for="multicol-phone">Phone No</label>
          </div>
        </div>
      </div>
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
      </div>
    </form>
  </div>
@endsection