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

    .blink{
        background-color:rgba(255, 0, 0, 0.6); 
        color:white;
        animation: blink-style 3s linear infinite;
    }

    @keyframes blink-style{
        50% {opacity : 0.5;  }
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
                <td> Name </td>
                <th> Tugas </th>
                <th> UTS </th>
                <th> UAS </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datas as $row) {?>
            <?php foreach($siswa as $row2){
                if($row['id_siswa'] == $row2['id']){?>
                <tr>
                <td><?php echo $row['id_siswa'];?> </td>
                <td><?php echo $row2['fname'] ." " .$row2['lname']?>  </td>
                <td <?php if($row['status_tugas']) echo "class='blink'";?>><?php echo $row['nilai_tugas'];?></td>
                <td <?php if($row['status_uts']) echo "class='blink'";?>><?php echo $row['nilai_uts'];?></td>
                <td <?php if($row['status_uas']) echo "class='blink'";?>><?php echo $row['nilai_uas'];?></td>
                <td>
                <a href=
                '
                <?php echo base_url('guru/editNilai?mapel='.$title.'&idsiswa='.$row['id_siswa'].'&idguru='.$row['id_guru'].'');?>
                ' 
                style='margin-right:10px; color:rgb(255,215,0);'>
                <button class='btn border border-dark edit' style='padding-left:15px;'>
                <i class='far fa-edit'></i>
                </button>
                </a>
                </td>
                </tr>
                <?php }}}?>
        </tbody>
        <tfoot>
            <td> ID </td>
            <td> Name </td>
            <td> Tugas </td>
            <td> UTS </td>
            <td> UAS </td>
            <td> Action </td>
        </tfoot>
    </table>

</div>

</div>
