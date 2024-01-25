<div class="common-form-section cmn-bg-tab">
    <form id="add-address" method="POST" action="{{route('user.user-address.store')}}">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Name*</label>
                    <input type="text" name="name" class="form-control" placeholder="Mark Ruffalo" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Email Address*</label>
                    <input type="text" name="email" class="form-control" placeholder="markruffalo@gmail.com" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="">Address (Street/Area)*</label>
                    <textarea name="address" id="" cols="30" rows="2" class="form-control"
                        placeholder="201-203, Rang Royal Residency,"></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">City/District/Town*</label>
                    <input type="text" name="city" class="form-control" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">State*</label>
                    <select name="state" class="form-control">
                        <option value="Gujarat">Gujarat</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Postal Code*</label>
                    <input type="number" class="form-control"  name="postalcode" placeholder="380081" pattern="/^-?\d+\.?\d*$/"
                        onKeyPress="if(this.value.length==6) return false;" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Contact Number*</label>
                    <input type="number" class="form-control" name="contact" placeholder="98980 98009" pattern="/^-?\d+\.?\d*$/"
                        onKeyPress="if(this.value.length==10) return false;" />
                </div>
            </div>
        </div>
        <div class="checkbox-wrap text-center">
            <div class="form-group">
                <input type="checkbox" id="default" name="is_default" value="true" checked>
                <label for="default">default</label>
            </div>
            <div class="form-group">
                <input type="radio" id="home" name="address_type" value="Home" checked>
                <label for="home">Home</label>
            </div>
            <div class="form-group">
                <input type="radio" id="work" name="address_type" value="Work">
                <label for="work">Work</label>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="g-btn f-btn mb-0">Save</button>
        </div>
    </form>
</div>


