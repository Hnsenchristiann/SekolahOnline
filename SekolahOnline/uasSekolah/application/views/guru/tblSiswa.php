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
</style>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Email </th>
                <th> Photo </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datas as $row) {

                echo "<tr>";
                echo "<td>S" . $row['id'] . "</td>";
                echo "<td>" . $row['fname'] . ' ' . $row['lname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><img src='" . base_url('assets/img/siswa/') . $row['image'] . "' style='width:100px; height:100px;'></td>";
                echo "</tr>";
            }
            // 'index.php/home/delete_table?page=dosen&id=' . $id . ''
            ?>
        </tbody>
        <tfoot>
            <td> ID </td>
            <td> Name </td>
            <td> Email </td>
            <td> Photo </td>
        </tfoot>
    </table>

    <div class="modal fade in" id="myModal" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile Request</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="exampleModalBody" <?php if(isset($cekProfile)){
                        if($cekProfile == 1)
                            echo "style='color:green;'";
                        else if($cekProfile == 2)
                            echo "style='color:red;'";
                    }?>><?php 
                    if(isset($cekProfile)){
                        if($cekProfile == 1)
                            echo "Edit Profile Approved by admin";
                        else if($cekProfile == 2)
                            echo "Edit Profile Rejected by admin";
                    }
                    ?> </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="tinjaunilai" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Review Score</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="exampleModalBody">Check Your Course in Sidebar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.7.1.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> -->
<!-- End of Main Content -->