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

<form style="margin: 50px;" method="POST" action="<?php echo base_url('guru/editProfileGuru') ?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">First Name</label>
            <input type="text" class="form-control" id="" placeholder="" name="fname" value="<?php echo $user['fname'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Last Name</label>
            <input type="text" class="form-control" id="" placeholder="" name="lname" value="<?php echo $user['lname'] ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Email</label>
            <div class="input-group">
                <input type="text" class="form-control" id="inputAddress" placeholder="" name="email" value="<?php
                                                                                                                $email = strtok($user['email'], '@');
                                                                                                                echo $email ?>" required>
                <span class="input-group-text">@guru.com</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image</label>
        <input type="file" value="<?php echo $user['image'] ?>" class="form-control-file" name="image" id="image" onchange="return fileValidation()" accept="image/gif, image/jpeg, image/png, image/jfif, image/jpg">
        <div id="error-image"></div>
        <div id="imagePreview"></div>
        <img id="img-awal" src='<?php echo base_url('assets/img/guru/') . $user['image'] ?>' style="width:200px; height:250px;">
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="" placeholder="" name="address" value="<?php echo $user['tempat_tinggal'] ?>">
    </div>
    <div class="form-group">
        <label for="inputNoTelp">Phone Number</label>
        <input type="text" class="form-control" id="" placeholder="" name="notelp" value="<?php echo $user['no_telp'] ?>">
    </div>

    <div class="form-row ">
        <div class="col-md-6">
            <label for="Birthdate">Birth Date</label>
            <input id="datepicker" name="date" value="<?php echo $user['tgl_lahir'] ?>" />
        </div>
        <div class="col-md-6">
            <label for="inputState">Gender</label>
            <select id="inputState" class="form-control" name="gender">
                <option <?php if ($user['jenis_kelamin'] == "Male") echo "selected"; ?>>Male</option>
                <option <?php if ($user['jenis_kelamin'] == "Female") echo "selected"; ?>>Female</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit Profile</button>
</form>
<script>
    $('#datepicker').datepicker({
        format: 'mmmm dd, yyyy',
        uiLibrary: 'bootstrap4',
    });
</script>