<div class="common-form-section cmn-bg-tab change-pass-wrap">
    <form method="POST" id="change-password" action="{{ route('user.update.password',['change-password' => true]) }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="form-group password-group">
                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" placeholder="Password" class="form-control @error('current_password') is-invalid @enderror" />
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group password-group">
                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    <label for="new_password">Create New Password</label>
                    <input type="password" name="new_password" placeholder="Password" class="form-control @error('new_password') is-invalid @enderror" />
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group password-group">
                    <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" name="confirm_password" placeholder="Password" class="form-control @error('confirm_password') is-invalid @enderror" />
                    @error('confirm_password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="g-btn f-btn mb-0">Update</button>
        </div>
    </form>

</div>
