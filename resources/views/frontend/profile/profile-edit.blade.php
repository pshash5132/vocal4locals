  <div class="common-form-section cmn-bg-tab">
      <form method="POST" action="{{route('user.profile.update')}}">
        @csrf
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Name*</label>
                      <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Mark Ruffalo" />
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Email Address*</label>
                      <input type="email"  name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="markruffalo@gmail.com" />
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label for="">Contact Number*</label>
                      <input type="number" name="contact" value="{{Auth::user()->contact}}" class="form-control" placeholder="98980 98009" pattern="/^-?\d+\.?\d*$/"
                          onKeyPress="if(this.value.length==10) return false;" />
                  </div>
              </div>
          </div>

          <div class="text-center">
              <button type="submit" class="g-btn f-btn mb-0">Save</button>
          </div>
      </form>
  </div>
