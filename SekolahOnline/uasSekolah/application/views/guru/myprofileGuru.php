<style>
        
        
        .container2 {
            width: 100%;
            height: 100%;
        }

        p {
            display: inline;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
        }

        .card {
            width: 450px;
            height: 250px;
            box-shadow: 0 8px 16px -8px rgba(0, 0, 0, 0.4);
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }
        @media only screen and (max-width: 500px) {
            .card {
            width: 150px;
            height: 250px;
            box-shadow: 0 8px 16px -8px rgba(0, 0, 0, 0.4);
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }

        }
        .layer {
            background-color: rgba(0, 0, 0, 0.4);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

        }

        .card h1 {
            margin-top: 20px;
            text-align: left;
            font-size: 25px;
        }

        .card .additional {
            position: relative;
            width: 150px;
            height: 100%;
            background-image: url('../assets/img/profile/profile7.jpg');
            background-position: center;
            transition: width 0.4s;
            overflow: hidden;
            z-index: 2;
        }



        .card:hover .additional {
            width: 100%;
            border-radius: 0 5px 5px 0;
        }

        .card .additional .user-card {
            width: 150px;
            height: 100%;
            position: absolute;
        }

        .card .additional .user-card::after {
            content: "";
            display: block;
            position: absolute;
            top: 10%;
            right: -2px;
            height: 80%;
            border-left: 2px solid rgba(0, 0, 0, 0.025);
        }


        .card .additional .more-info {
            width: 300px;
            float: left;
            position: absolute;
            left: 150px;
            height: 100%;
        }

        .card .additional .more-info h1 {
            color: #fff;
            margin-bottom: 0;
            margin-left: 14px;
        }


        .card .additional .coords {
            margin-top: 10px;
            margin-left: 15px;
            color: #fff;
            font-size: 1rem;
        }

        .card .general {
            width: 300px;
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1;
            box-sizing: border-box;
            padding: 1rem;
            padding-top: 0;
        }

        .card .general .more {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            font-size: 0.9em;
        }

        .card .general p {
            font-size: auto;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


        <div class="container2">

            <div class="card">
                <div class="additional">
                    <div class="layer">
                        <div class="user-card">
                            <img class="center" src="<?php echo base_url('assets/img/siswa/') . $user['image']; ?>" style="border-radius:50%; width :100px; height:100px;">
                        </div>
                        <div class="more-info">
                            <h1><?php echo $user['fname'] . " " . $user['lname'] ?></h1>
                            <div class="coords">
                                <p>Gender : <?php echo $user['jenis_kelamin'] ?></p><br>
                                <p>Birth Date : <?php echo $user['tgl_lahir'] ?></p><br>
                                <p>Address : <?php echo $user['tempat_tinggal'] ?></p><br>
                                <p>No telp : <?php echo $user['no_telp'] ?></p><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="general">
                    <h1><?php echo $user['fname'] . " " . $user['lname'] ?></h1>
                    <p>ID : <?php echo "S" . $user['id'] ?></p><br>
                    <p>Email : <?php echo $user['email'] ?></p><br>
                    <span class="more">Mouse over the card for more info</span>
                </div>
            </div>

        </div>
        <a class="btn btn-primary <?php if(!empty($datas)) echo 'disabled'?>" href="<?php echo base_url('guru/editProfile');?>">change profile</a>
    </div>
    <!-- /.container-fluid -->