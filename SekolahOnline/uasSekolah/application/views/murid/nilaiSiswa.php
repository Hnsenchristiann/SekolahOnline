<style>
    thead,
    th {
        text-align: center;
    }

    td {
        text-align: center;
    }

    .delete:hover {
        color: red;
        background-color: white;
    }

    .edit:hover {
        color: blue;
        background-color: white;
    }

    @import url('https://fonts.googleapis.com/css?family=Roboto+Mono');


    h1 {
        font-size: 2.2em;
    }

    .flip-card {
        position: relative;
        display: inline-block;
        background-color: transparent;
        /* width: 300px; */
        /* height: 300px; */
        perspective: 10000px;
    }

    .flip {
        position: relative;
        display: inline-block;
        margin-right: 2px;
        margin-bottom: 1em;
        width: 400px;

        text-align: center;
        transition: transform 1s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    @media only screen and (max-width: 500px) {
        .flip {
            position: relative;
            display: inline-block;
            margin-right: 2px;
            margin-bottom: 1em;
            width: 300px;

            text-align: center;
            transition: transform 1s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
    }
        .flip-card:hover .flip {
            transform: rotateY(180deg);
        }

        .flip-card:hover .back {
            opacity: 1;
            transform: rotateY(180deg);
        }

        .front,
        .back {
            color: white;
            width: inherit;
            background-size: cover !important;
            background-position: center !important;
            height: 220px;
            padding: 1em 2em;
            background: #313131;
            border-radius: 10px;
        }

        .front {
            transform: rotateY(0deg);
        }

        .back {
            position: absolute;
            opacity: 0;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            transform: rotateY(180deg);

            transition: opacity, 1.1s;
            /* transform: rotateY(180deg); */

        }

        /* .front:hover {
        transform: rotateY(180deg);
    }*/

        /* .back:hover {
        opacity: 1;
        transform: rotateY(0deg);
    }  */


        p {
            font-size: 0.9125rem;
            line-height: 160%;
            color: #999;
        }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h2>
        <?php
        echo "Guru : " . $guru['fname'] . " " . $guru["lname"];
        ?>
    </h2>
    <div class="container">
        <?php
        foreach ($datag as $row) { ?>
            <div class="flip-card">
                <div class="flip">
                    <div class="front" style="background-image: url(<?php if ($row['mapel'] == "IPA") echo base_url("assets/img/mapel/ipa.png");
                                                                    else if ($row['mapel'] == "Matematika") echo base_url("assets/img/mapel/mat.jpg");
                                                                    else if ($row['mapel'] == "PKN") echo base_url("assets/img/mapel/pkn.jpg");
                                                                    else if ($row['mapel'] == "IPS") echo base_url("assets/img/mapel/ips.jpg");
                                                                    else if ($row['mapel'] == "Bahasa Indonesia") echo base_url("assets/img/mapel/bi.png");
                                                                    else if ($row['mapel'] == "Seni Budaya") echo base_url("assets/img/mapel/seni.jpg");
                                                                    else if ($row['mapel'] == "Pendidikan Jasmani") echo base_url("assets/img/mapel/or.png");
                                                                    else if ($row['mapel'] == "Bahasa Inggris") echo base_url("assets/img/mapel/inggris.jpg");
                                                                    ?> )">
                        <h1 class="text-shadow" style="color:black; margin-top:10px;"><?php echo $row['mapel']; ?></hi>
                    </div>
                    <div class="back">
                        <a class='btn border border-dark delete' href='' style='position:absolute;top:0;right:0;' data-toggle='modal' data-target='#deleteGuruModal<?php echo $row["count"]; ?>'>
                            <i class='fas fa-bell'></i></i>
                        </a>
                        <h2 style="margin-top:10px;">Grade :
                            <?php
                            $nilai = $row['nilai_tugas'] * 0.4 + $row['nilai_uas'] * 0.3  + $row['nilai_uts'] * 0.3;
                            if ($nilai >= 85) {
                                echo "A (" . $nilai . ")";
                            } else if ($nilai >= 80) {
                                echo "B+ (" . $nilai . ")";
                            } else if ($nilai >= 70) {
                                echo "B (" . $nilai . ")";
                            } else if ($nilai >= 65) {
                                echo "C+ (" . $nilai . ")";
                            } else if ($nilai >= 60) {
                                echo "C (" . $nilai . ")";
                            } else if ($nilai >= 55) {
                                echo "D+ (" . $nilai . ")";
                            } else {
                                echo "D (" . $nilai . ")";
                            }

                            ?></h2>
                        <p style="margin-top:10px;">Tugas : <?php echo $row['nilai_tugas']; ?></p>
                        <p style="margin-top:10px;">UTS : <?php echo $row['nilai_uts']; ?></p>
                        <p style="margin-top:10px;">UAS : <?php echo $row['nilai_uas']; ?></p>
                    </div>
                </div>
            </div>
            <div class=" modal fade modalCek" id="deleteGuruModal<?php echo $row['count'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Review Score <?php echo $row['mapel']; ?>?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" id="exampleModalBody">Select the assestment you want to review your score</div>
                        <!-- <div class="modal-body" id="exampleModalBody">Your point will be deducted by 15 point</div> -->
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary <?php if ($row['status_tugas'] == 1) echo "disabled" ?>" href="<?php echo base_url('murid/tinjauNilai?id=') . $row['count'] . '&assestment=tugas';
                                                                                                                        ?>">Tugas</a>
                            <a class="btn btn-primary <?php if ($row['status_uts'] == 1) echo "disabled" ?>" href="<?php echo base_url('murid/tinjauNilai?id=') . $row['count'] . '&assestment=uts';
                                                                                                                    ?>">UTS</a>
                            <a class="btn btn-primary <?php if ($row['status_uas'] == 1) echo "disabled" ?>" href="<?php echo base_url('murid/tinjauNilai?id=') . $row['count'] . '&assestment=uas';
                                                                                                                    ?>">UAS</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>
<!-- /.container-fluid -->
<div class="modal fade in" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile Request</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="exampleModalBody" <?php if (isset($cekProfile)) {
                                                                if ($cekProfile == 1)
                                                                    echo "style='color:green;'";
                                                                else if ($cekProfile == 2)
                                                                    echo "style='color:red;'";
                                                            } ?>><?php
                                                                    if (isset($cekProfile)) {
                                                                        if ($cekProfile == 1)
                                                                            echo "Edit Profile Approved by admin";
                                                                        else if ($cekProfile == 2)
                                                                            echo "Edit Profile Rejected by admin";
                                                                    }
                                                                    ?> </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End of Main Content -->