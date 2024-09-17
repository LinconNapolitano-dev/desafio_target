<?php
//Array faturamento 
$arr_fat = [
    0, 1350.22, 5845.35, 2685.00, 4882.00, 4841.99, 0
];

//Filtra faturamento zerado 
$arr_fat_filtrado = array_filter($arr_fat, function($valor) {
    return $valor > 0;
});

if (empty($arr_fat_filtrado)) {
    echo "Não há fat registrado.\n";
    return;
}

$menor_fat = min($arr_fat_filtrado);
$maior_fat = max($arr_fat_filtrado);

//Calcula  media
$soma_fat = array_sum($arr_fat_filtrado);
$numero_dias_fat = count($arr_fat_filtrado);
$media_anual = $soma_fat / $numero_dias_fat;

//Contador numero de dias acima da media 
$dias_acima_media = array_filter($arr_fat, function($valor) use ($media_anual) {
    return $valor > $media_anual;
});
$numero_dias_acima_media = count($dias_acima_media);

echo "Menor valor de fat: R$ " . number_format($menor_fat, 2, ',', '.') . "\n";
echo "Maior valor de fat: R$ " . number_format($maior_fat, 2, ',', '.') . "\n";
echo "Número de dias com fat superior à média anual: " . $numero_dias_acima_media . "\n";
?>