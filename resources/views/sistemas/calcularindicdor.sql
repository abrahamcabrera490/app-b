--Promedio Mes anterior
SELECT AVG(eventos) FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())-1
--Promedio Mes Actual
SELECT AVG(eventos) FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())




--Se saca un promedio de los eventos que se tienen y se calcula el promedio
--del mes pasado contra el del mes ctual y ahi podemos ver si subimos o bajamos
-- como se muestra en el siguiente algoritmo  se saca el porcentaje en el que 
--se encuentra el deparatamento en base a sus eventos
--Algoritmo para sacar indicador   indicador = (mes_actual  * 100) / mes anterior

public function indicador ()
{

$prom_mes_actual = SELECT AVG(eventos) FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())

$prom_mes_ant = SELECT AVG(eventos) FROM  sistemas WHERE MONTH(fecha)=  MONTH(NOW())-1



$indicador = ($prom_mes_actual * 100)/$prom_mes_ant;




}