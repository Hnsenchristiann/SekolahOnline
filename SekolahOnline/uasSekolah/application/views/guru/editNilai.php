<h1 class="ml-5"><?php echo $title ?></h1>
<? echo $datas; ?>
<form class="ml-5" method="POST" action="<?php echo base_url('guru/editNilaiSiswa?mapel='.$title.'&idsiswa='.$_GET['idsiswa'].'&idguru='.$_GET['idguru'].''); ?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputFirst">Tugas</label>
            <input type="number" class="form-control col-md-6" id="" value="<?php echo $tugas;?>" name="tugas" pattern="[0-9]+" title="Please enter number only" min="0" max="100">
        </div>
        <div class="form-group col-md-4">
            <label for="inputLast">UTS</label>
            <input type="number" class="form-control col-md-6" id="" value="<?php echo $uts;?>" name="uts" pattern="[0-9]+" title="Please enter number only" min="0" max="100">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail">UAS</label>
            <input type="number" class="form-control col-md-6" id="" value="<?php echo $uas;?>" name="uas" pattern="[0-9]+" title="Please enter number only" min="0" max="100">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit Nilai</button>
</form>