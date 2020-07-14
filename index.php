$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/burgasweb/obednomenu/master/content.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

echo $data;


$txt_file    = file_get_contents('https://raw.githubusercontent.com/burgasweb/obednomenu/master/content.txt');
$rows        = explode("\n", $txt_file);
array_shift($rows);

foreach($rows as $row => $data)
{
    //get row data
    $row_data = explode('^', $data);

    $info[$row]['id']           = $row_data[0];
    $info[$row]['name']         = $row_data[1];
    $info[$row]['description']  = $row_data[2];
    $info[$row]['images']       = $row_data[3];

    //display data
    echo   $info[$row]['id'] . '<br />';


    //display images
    $row_images = explode(',', $info[$row]['images']);

    foreach($row_images as $row_image)
    {
        echo '  ' . $row_image . '<br />';
    }

    echo '<br />';
}
