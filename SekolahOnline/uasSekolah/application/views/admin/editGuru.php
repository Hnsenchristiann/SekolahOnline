<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script>
    // function checkTitle() {
    //   var title = document.getElementById("title");
    //   var message = document.getElementById("error-title");
    //   var goodColor = "#FFFFFFFF";
    //   var badColor = "#ff6666";

    //   if (title.value.length == 0) {
    //     title.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*This field cant be empty";
    //   } else if (title.value.length > 0) {
    //     title.style.backgroundColor = goodColor;
    //     message.style.color = goodColor;
    //     message.style.display = "none";
    //   }
    // }

    // function checkYear() {
    //   var year = document.getElementById('year');
    //   var message = document.getElementById('error-year');
    //   var goodColor = "#FFFFFFFF";
    //   var badColor = "#ff6666";
    //   var regex = /^[0-9]+$/;

    //   if (year.value.length == 4 && year.value.match(regex) || year.value.length == 5 && year.value.match(regex)) {
    //     year.style.backgroundColor = goodColor;
    //     message.style.color = goodColor;
    //     message.style.display = "none";
    //   } else if (year.value.length == 0) {
    //     year.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*This field cant be empty";
    //   } else if (!year.value.match(regex)) {
    //     year.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*Input only number";
    //   } else if (year.value.length < 4) {
    //     year.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*Input minimal 4 number";
    //   } else if (year.value.length > 5) {
    //     year.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*Input maximal 5 number";
    //   }
    // }

    // function checkDirector() {
    //   var director = document.getElementById("director");
    //   var message = document.getElementById("error-director");
    //   var goodColor = "#FFFFFFFF";
    //   var badColor = "#ff6666";

    //   if (director.value.length > 30) {
    //     director.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*Input cant exceed 30 character";
    //   } else if (director.value.length == 0) {
    //     director.style.backgroundColor = badColor;
    //     message.style.color = badColor;
    //     message.style.display = "initial";
    //     message.innerHTML = "*This field cant be empty";
    //   } else {
    //     director.style.backgroundColor = goodColor;
    //     message.style.color = goodColor;
    //     message.style.display = "none";
    //   }

    // }

    function fileValidation() {
        var FileSize = document.getElementById("image").files[0].size / 1024 / 1024;
        var message = document.getElementById("error-image");
        var img = document.getElementById("img-awal");
        var badColor = "#ff6666";
        var fileInput = document.getElementById('image');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.jfif|\.gif)$/i;
        if (!allowedExtensions.exec(filePath)) {
            message.style.display = "initial";
            message.style.color = badColor;
            message.innerHTML = "*Please upload file having extensions .jpeg/.jpg/.png/.gif/.jfif only.";
            fileInput.value = '';
            return false;
        } else if (FileSize > 1) {
            message.style.display = "initial";
            message.style.color = badColor;
            message.innerHTML = "*File size cant exceeds 1 MB";
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                message.style.display = "none";
                img.style.display = "none";
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img style="width:200px; heigth:250px;" src="' + e.target.result + '"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }
</script>

<form style="margin: 50px;" method="POST" action="<?php echo base_url('admin/editProfileGuru') ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">First Name</label>
            <input type="text" class="form-control" id="" placeholder="" name="fname" value="<?php echo $userguru['fname'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Last Name</label>
            <input type="text" class="form-control" id="" placeholder="" name="lname" value="<?php echo $userguru['lname'] ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Email</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="" name="email" value="<?php
                                                                                                            $email = strtok($userguru['email'], '@');
                                                                                                            echo $email ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="" style="color:transparent">.</label>
            <div class="input-group-text">@guru.com</div>
        </div>
    </div>
    <!-- <div class="form-group">
    <label for="inputAddress2">Password</label>
    <input type="password" class="form-control" id="inputAddress2" placeholder="" name="password" >
  </div> -->
    <!-- <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div> -->
    <div class="form-group">
        <label for="exampleFormControlFile1">Image</label>
        <input type="file" value="<?php echo $userguru['image'] ?>" class="form-control-file" name="image" id="image" onchange="return fileValidation()" accept="image/gif, image/jpeg, image/png, image/jfif, image/jpg">
        <div id="error-image"></div>
        <div id="imagePreview"></div>
        <img id="img-awal" src='<?php if (empty($userguru['image'])) echo base_url('assets/img/guru/') . $userguruawal['image'];
                                else echo base_url('assets/img/guru/') . $userguru['image']; ?>' style="width:200px; height:250px;">
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="" placeholder="" name="address" value="<?php echo $userguru['tempat_tinggal'] ?>">
    </div>
    <div class="form-group">
        <label for="inputNoTelp">Phone Number</label>
        <input type="text" class="form-control" id="" placeholder="" name="notelp" value="<?php echo $userguru['no_telp'] ?>">
    </div>
    <!-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" id="inputCity" name="state">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip">
    </div>
  </div> -->
    <div class="form-row ">
        <div class="col-md-6">
            <label for="Birthdate">Birth Date</label>
            <input id="datepicker" name="date" value="<?php echo $userguru['tgl_lahir'] ?>" />
        </div>
        <div class="col-md-6">
            <label for="inputState">Gender</label>
            <select id="inputState" class="form-control" name="gender">
                <option <?php if ($userguru['jenis_kelamin'] == "Male") echo "selected"; ?>>Male</option>
                <option <?php if ($userguru['jenis_kelamin'] == "Female") echo "selected"; ?>>Female</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="action" value="approve">Approve</button>
    <button type="submit" class="btn btn-danger" name="action" value="cancel">Cancel</button>
</form>
<script>
    $('#datepicker').datepicker({
        format: 'mmmm dd, yyyy',
        uiLibrary: 'bootstrap4',
    });
</script>