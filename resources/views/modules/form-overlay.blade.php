<div class="form-overlay {{ count($errors)> 0 || session('success') ? 'active' : '' }}">
    <div class="container">
        <div class="notification-form py-4 px-5 col-sm-6 col-xs-12">
            <img class="close-button" src="{{ asset('storage/images/x.png') }} " alt="Close button" />
            <form class="{{ session( 'success') ? '' : 'active' }}" method='POST' action='{{ Request::path() }}'> {{ csrf_field() }}
                <fieldset>
                    <label class="mt-3 " for='firstname'>* First name</label>
                    <input type='text' name='firstname' id='firstname'>
    @include('modules.error-field', ['field' => 'firstname'])
                    <label class="mt-3 " for='lastname'>* Last name</label>
                    <input type='text' name='lastname' id='lastname'>
    @include('modules.error-field', ['field' => 'lastname'])
                    <label class="mt-3 " for='email'>* Email address:</label>
                    <input type='text' name='email' id='email'>
    @include('modules.error-field', ['field' => 'email'])
                </fieldset>
                <input type='submit' class="btn btn-primary mt-4 col-xs-push-3ml-sm-3 " value='Submit'>
            </form>
            @if (session('success'))
            <p class="success-message">Thank you! A notification will be sent to {{ $email }}</p>
            @endif
        </div>
    </div>
</div>