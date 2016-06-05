SELECT 
	candidato.*, 
	candCargo.nome AS NomeCargo, 
	partido.sigla AS SiglaPartido, 
	SUM(CASE WHEN candReceitas.ano = '2014' THEN candReceitas.valor ELSE 0 END) AS sum_receitas_2014,	
	SUM(CASE WHEN candReceitas.ano = '2014' THEN candReceitas.valor ELSE 0 END) AS sum_receitas_2010,
	SUM(CASE WHEN candBens.ano = '2014' THEN candBens.valor ELSE 0 END) AS sum_bens_2014,
	SUM(CASE WHEN candBens.ano = '2010' THEN candBens.valor ELSE 0 END) AS sum_bens_2010
FROM candidato
	LEFT JOIN candCargo
        	ON candidato.cargo = candCargo.codigo
        	AND candidato.situacao='ELEITO'	
        LEFT JOIN candReceitas
        	ON candidato.id = candReceitas.id
        LEFT JOIN partido
        	ON candidato.partido = partido.codigo
        LEFT JOIN candBens
        	ON candidato.id = candBens.id
        GROUP BY candidato.id ORDER BY sum_valor DESC
        LIMIT 10
