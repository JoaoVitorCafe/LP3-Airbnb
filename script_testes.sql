select * from bd_airbnb.cartoes;
select * from bd_airbnb.usuarios;
select * from bd_airbnb.enderecos;
select * from bd_airbnb.tipos;
select * from bd_airbnb.caracteristicas;
select * from bd_airbnb.imoveis;
select * from bd_airbnb.imoveis_has_caracteristicas;
select * from bd_airbnb.periodos;

select * from bd_airbnb.imoveis_has_caracteristicas inner join bd_airbnb.caracteristicas 
on bd_airbnb.imoveis_has_caracteristicas.caracteristicas_idcaracteristicas = bd_airbnb.caracteristicas.idcaracteristicas
where bd_airbnb.imoveis_has_caracteristicas.imoveis_idimoveis = 9;
/*
<select name="tipo_imovel" id="tipo">
                <option selected>Tipo</option>
                <option value="1">Quarto</option>
                <option value="2">Apartamento</option>
                <option value="3">Casa</option>
                <option value="4">Fazenda</option>
              </select>  
              
                    <select name="caracteristicas_imovel[]" id="caracteristicas" multiple size = 7>
                <option value="1">Cozinha</option>
                <option value="2">Jacuzzi</option>
                <option value="3">Refrigerador</option>
                <option value="4">Camera de segurança</option>
                <option value="5">Wifi</option>
                <option value="6">Garagem</option>
                <option value="7">Alarme de incêndio</option>
              </select>  
  
			INSERT INTO `tipos`(`nome`) 
				VALUES('Quarto'),
				('Apartamento'),
				('Casa'),
				('Fazenda');

			
  
        
              
              INSERT INTO `caracteristicas`(`nome`) 
				VALUES('Cozinha'),
				('Jacuzzi'),
				('Refrigerador'),
				('Camera de segurança'),
				('Wifi'),
				('Garagem'),
				('Alarme de incêndio');
*/