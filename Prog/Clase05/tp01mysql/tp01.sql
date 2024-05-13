//Mauricio Rojas
//TP 01

1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.

select apellido, nombre from usuario order by 1, 2 desc

2. Obtener los detalles completos de todos los productos líquidos.

select * from producto where Tipo = 'liquido'

3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.

select * from venta where cantidad >= 6 and cantidad <= 10

4. Obtener la cantidad total de todos los productos vendidos.

select SUM(cantidad) from venta

5. Mostrar los primeros 3 números de productos que se han enviado.

select p.codigo_de_barra from producto p inner join venta v on p.id = v.Id_Producto
order by v.fecha_de_venta asc limit 3

6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.

select CONCAT(u.nombre,' ', u.apellido), p.nombre from usuario u inner join venta v on u.id = v.id_usuario
inner join producto p on p.Id = v.id_producto

7. Indicar el monto (cantidad * precio) por cada una de las ventas.

select (p.precio * v.cantidad) as precioVenta from venta v inner join producto p on v.id_producto = p.id

8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.

select sum(v.cantidad) from producto p inner join venta v on p.id = v.id_producto inner join usuario u on u.id = v.Id_usuario
where v.Id_Usuario = 104 and p.Id = 1003

9. Obtener todos los números de los productos vendidos por algún usuario de ‘Avellaneda’.

select p.codigo_de_barra, p.nombre from producto p inner join venta v on p.id = v.id_producto inner join usuario u on u.id = v.id_usuario
where u.Localidad = 'Avellaneda'

10.Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.

select * from usuario where nombre like '%u%'

11. Traer las ventas entre junio del 2020 y febrero 2021.

select * from venta where fecha_de_venta between '2020-06-01' and '2021-02-01'

12. Obtener los usuarios registrados antes del 2021.

select * from usuario where fecha_de_registro < '2021-01-01'



13.Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.

insert into producto (codigo_de_barra,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion)
VALUES (79900311,'Chocolate','Sólido',10, 25.35,'2024-02-09','2024-09-26')


14.Insertar un nuevo usuario .

insert into usuario (nombre, apellido, clave, mail, fecha_de_registro, localidad)
VALUES ('Almendra','Tul', 1199, 'laamend@wisc.edu','2024-11-28','Cachay')

15.Cambiar los precios de los productos de tipo sólido a 66,60.

update producto set precio = 66.60 where tipo = 'solido'

16.Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores a 20 inclusive.

update producto set cantidad = 0 where cantidad <= 20

17.Eliminar el producto número 1010.

delete producto where id = 1010

18.Eliminar a todos los usuarios que no han vendido productos.

delete usuario u inner join venta v on v.id_usuario = u.id 
where v.cantidad = 0