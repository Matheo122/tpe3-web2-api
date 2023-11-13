# tpe3-web2-api

# E-COMMERCE


### Descripcion del proyecto:
este proyecto tiene el objetivo de crear una API de una tienda de ropa.
esta desarrollado con el patron de diseño MVC.


### Integrante:
Matheo Pacenti 
gmail:matheopacenti1@gmail.com

## Endpoints:
#### localhost/tpe3-web2-api/api/products
- GET /products: dejando la URL como esta en la linea 16 devuelve todos los productos 
>
[
    {
        "id_producto": 72,
        "categoria": 4,
        "descripcion": "assdfdsfsd",
        "talla": "S",
        "precio": 2223,
        "nombre": "Black madera"
    },
    {
        "id_producto": 73,
        "categoria": 4,
        "descripcion": "asd",
        "talla": "awsd",
        "precio": 2,
        "nombre": "asd"
    },
    {
        "id_producto": 75,
        "categoria": 1,
        "descripcion": "sadasd",
        "talla": "S",
        "precio": 2344343,
        "nombre": "Black woodd"
    }
etc....
 ]
>
Los servicios brindados por la API deben cumplir unos requerimientos mínimos* pero idealmente se debe pensar alguna idea original que se adapte a su contexto, para este punto hice este endpoint
- GET localhost/tpe3-web2-api/api/products/?category=2:
trae productos por categoria(categorias disponibles: 1,2 y 3).

- GET localhost/tpe3-web2-api/api/products/?sortby=precio&order=ASC
la propiedad order Recibe como valor "ASC" o "DESC" y varía el orden de forma ascendente o descendente de devolver los resultados según la propiedad sort, que va a funcionar con cualquier elemento de la tabla(punto 9 opcionales).

- GET localhost/tpe3-web2-api/api/products/73
devuelve un producto establecido por ID

- DELETE localhost/tpe3-web2-api/api/products/73
elimina un producto establecido por ID

- PUT localhost/tpe3-web2-api/api/products/73
Actualiza un producto (enviado en formato JSON) segun su ID
>
    {
        "id_producto": 72,
        "categoria": 4,
        "descripcion": "assdfdsfsd",
        "talla": "S",
        "precio": 2223,
        "nombre": "Black madera"
    }


- localhost/tpe3-web2-api/api/products/?page=2
Devuelve la página de resultados definida. Acepta números enteros positivos, page 1 seran los primeros 5 primeros productos, page 2 los siguientes 5 y asi susecivamente.
