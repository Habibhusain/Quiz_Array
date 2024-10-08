<!DOCTYPE html>

<?php
$list_soal = array(
    array(
        'soal' => 'Soal pertama 1',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
    ),
    array(
        'soal' => 'Soal kedua 2',
        'jawaban' => array(
            'A' => 'Jawaban A',
            'B' => 'Jawaban B',
            'C' => 'Jawaban C',
            'D' => 'Jawaban D',
        ),
    ),
);

// $request_user =  Array ( 
//     [soal1] => A 
//     [soal2] => B 
// );

$kunci_jawaban = array('A', 'B');

$hasil = '';
$jawaban_benar = 0;
$jawaban_salah = 0;
for($i=0; $i<2; $i++)
{
    $index_inputan = $i+1;
    $jawaban = $_GET["soal$index_inputan"];
    $ambil_kunci = $kunci_jawaban[$i];
    
    if ($jawaban == $ambil_kunci)
    {
        $jawaban_benar += 1;
    }
    else
    {
        $jawaban_salah += 1;
    }
}

$nilai = $jawaban_benar / count($list_soal) * 100;



?>
<html lang="en">
    <head>
        <title>Website Quiz</title>
        <style>
         body{
                margin:auto;
                width:600px; 
                font-size:20px;
            }
            h1{
                margin-top:80px;
            }
            p{
                color:green;
            }
        </style>
    </head>
        <body>
            <h1>Kerjakan Soal Berikut ini</h1>
            <form method="GET">
            <?php $i=1; ?>
            <?php foreach($list_soal as $soal): ?>
                <fieldset class="tabel1"><legend><?php echo $soal['soal']; ?></legend>
                
                <?php foreach ($soal['jawaban'] as $k_jb => $v_jb) : ?>
                    <input type="radio" name="soal<?php echo $i; ?>" value="<?php echo $k_jb; ?>" ><?php echo $v_jb; ?> <br>
                <?php endforeach; ?>
                
                </fieldset>
            <?php $i++; ?>
            <?php endforeach; ?>
            <button type="submit">Cek jawaban</button>
            </form>
            <br>
           
           <span>Nilai Kamu adalah <?php echo $nilai;?></span>
        </body>
</html>