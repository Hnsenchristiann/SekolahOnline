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

    .fa-edit {
        margin-right: -4px;
    }

    .edit:hover {
        color: blue;
        background-color: white;
    }


    .blink {
        background-color: rgba(255, 0, 0, 0.6);
        color: white;
        animation: blink-style 3s linear infinite;
    }

    .edit2 {
        color: white;
        animation: blink-style2 2s linear infinite;
    }

    .edit2:hover{
        color:black;
        background: white;
    }
    @keyframes blink-style {
        50% {
            opacity: 0.5;
        }
    }

    @keyframes blink-style2 {
        50% {
            opacity: 0.5;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?php echo base_url('admin/tambahGuru'); ?>">
        <button class="btn btn-primary col-sm-3 col-ms-3">+Guru</button>
    </a>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Email </th>
                <th> Photo </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($editguru)) {
                foreach ($datag as $row) {
            ?>
                    <?php foreach ($editguru as $cek) { ?>
                        <tr>
                            <?php
                            if ($cek['id'] == $row['id'] && $cek['status'] == 0) { ?>
                                <td class="blink"><?php echo "G" . $row['id']; ?></td>
                                <td class="blink"><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                <td class="blink"><?php echo $row['email']; ?></td>
                                <td class="blink"><img src='<?php echo base_url('assets/img/guru/') . $row['image']; ?>' style='width:100px; height:100px;'></td>
                                <td class="blink">
                                    <a href='<?php echo base_url('admin/deleteGuru?id=') . $row['id']; ?>' class='btn border border-dark delete' style=' margin-right:10px;' data-toggle='modal' data-target='#deleteGuruModal<?php echo $row["id"]; ?>'>
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                    <a href='<?php echo base_url('admin/editGuru?id=') . $row['id']; ?>' style='margin-right:10px;' class='btn border border-dark edit2'>
                                        <i class='far fa-edit'></i>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td><?php echo "G" . $row['id']; ?></td>
                                <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><img src='<?php echo base_url('assets/img/guru/') . $row['image']; ?>' style='width:100px; height:100px;'></td>
                                <td>
                                    <a href='<?php echo base_url('admin/deleteGuru?id=') . $row['id']; ?>' class='btn border border-dark delete' style=' margin-right:10px;' data-toggle='modal' data-target='#deleteGuruModal<?php echo $row["id"]; ?>'>
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                    <a href='' style='margin-right:10px;' class='btn border border-dark edit'>
                                        <i class='far fa-edit'></i>
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                        <div class=" modal fade modalCek" id="deleteGuruModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Guru <?php echo "G" . $row['id']; ?>?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="exampleModalBody">Select "Delete" below if you want to delete <?php echo $row['fname'] . " " . $row['lname']; ?></div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="<?php echo base_url('admin/deleteGuru?id=') . $row['id']; ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            } else if (empty($editguru)) {
                foreach ($datag as $row) { ?>
                    <tr>
                        <td><?php echo "G" . $row['id']; ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><img src='<?php echo base_url('assets/img/guru/') . $row['image']; ?>' style='width:100px; height:100px;'></td>
                        <td>
                            <a href='<?php echo base_url('admin/deleteGuru?id=') . $row['id']; ?>' class='btn border border-dark delete' style=' margin-right:10px;' data-toggle='modal' data-target='#deleteGuruModal<?php echo $row["id"]; ?>'>
                                <i class='fas fa-trash-alt'></i>
                            </a>
                            <a href='' style='margin-right:10px;' class='btn border border-dark edit'>
                                <i class='far fa-edit'></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <div class=" modal fade modalCek" id="deleteGuruModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Guru <?php echo "G" . $row['id']; ?>?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="exampleModalBody">Select "Delete" below if you want to delete <?php echo $row['fname'] . " " . $row['lname']; ?></div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="<?php echo base_url('admin/deleteGuru?id=') . $row['id']; ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
        </tbody>
        <tfoot>
            <td> ID </td>
            <td> Name </td>
            <td> Email </td>
            <td> Photo </td>
            <td> Action </td>
        </tfoot>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->