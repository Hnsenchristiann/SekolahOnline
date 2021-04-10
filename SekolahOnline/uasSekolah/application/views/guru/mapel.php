<style>

</style>
<?php
$matematika = 0;
$ipa = 0;
$ips = 0;
$pkn = 0;
$indo = 0;
$inggris = 0;
$seni = 0;
$or = 0;
foreach ($datas as $row) {
    if ($row['mapel'] == "Matematika" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $matematika++;
    else if ($row['mapel'] == "IPA" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $ipa++;
    else if ($row['mapel'] == "IPS" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $ips++;
    else if ($row['mapel'] == "PKN" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $pkn++;
    else if (($row['status_tugas'] || $row['status_uts'] || $row['status_uas']) && $row['mapel'] == "Bahasa Indonesia")
        $indo++;
    else if ($row['mapel'] == "Bahasa Inggris" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $inggris++;
    else if ($row['mapel'] == "Seni Budaya" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $seni++;
    else if ($row['mapel'] == "Pendidikan Jasmani" && ($row['status_tugas'] || $row['status_uts'] || $row['status_uas']))
        $or++;
}
echo "<br>";
?>
<div class="container">
    <div class="ml-5 row">
        <a href="<?php echo base_url('guru/mapel?mapel=Matematika'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $matematika ?></div>
                        <h5 class="card-title">Mathematics</h5>
                        <p class="card-text">Matematika</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url('guru/mapel?mapel=IPA'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $ipa ?></div>
                        <h5 class="card-title">Natural Science</h5>
                        <p class="card-text">IPA</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo base_url('guru/mapel?mapel=IPS'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $ips ?></div>
                        <h5 class="card-title">Sosial Science</h5>
                        <p class="card-text">IPS</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url('guru/mapel?mapel=PKN'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $pkn ?></div>
                        <h5 class="card-title">Civic Education</h5>
                        <p class="card-text">PKN</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo base_url('guru/mapel?mapel=Bahasa Indonesia'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $indo ?></div>
                        <h5 class="card-title d-inline">Indonesian</h5>
                        <p class="card-text">Bahasa Indonesia</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url('guru/mapel?mapel=Bahasa Inggris'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $inggris ?></div>
                        <h5 class="card-title">English</h5>
                        <p class="card-text">Bahasa Inggris</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo base_url('guru/mapel?mapel=Seni Budaya'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $seni ?></div>
                        <h5 class="card-title">Art, Culture, and Skill</h5>
                        <p class="card-text">Seni Budaya</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="<?php echo base_url('guru/mapel?mapel=Pendidikan Jasmani'); ?>">
            <div class="col-md-4 col-sm-2">
                <div class="card border-primary mb-3" style="max-height: 100px; width:400px;">
                    <div class="card-body text-primary">
                        <div class="d-inline float-right bg-danger" style="color:white; width:25px; height:25px; border-radius:50%; text-align:center;"><?php echo $or ?></div>
                        <h5 class="card-title">Physical Eductaion</h5>
                        <p class="card-text">Pendidikan Jasmani</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>