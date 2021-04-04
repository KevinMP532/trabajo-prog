# Endpoints y formatos de request Backend.


## Instalación

El proyecto debe de estar dentro de la carptea xampp/htdocs para ejecutarlo.

## Verificar si un usuario existe
#### Endpoint: 
```yaml
http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/verifyID.php
```
#### Request:
```yaml
{
   "idUsuario" : "12345678"
}
```
#### Response(Normal):
```yaml
{
    "idUsuario": "12345678",
    "nombre": "ANTONIO"
}
```
#### Response(Usuario inexistente):
```yaml
{
    "message": "User does not exist."
}
```
## Agendarme ingresando CI
#### Endpoint: 
```yaml
http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/schedule.php
```
#### Request:
```yaml
{
   "idUsuario" : "12345678",
   "telefono" : "12345678"
}
```
#### Response (Normal):
```yaml
{
    "message": "User scheduled successufully"
}
```
#### Response (Usuario ya agendado):
```yaml
{
    "message": "User has already been scheduled"
}
```
## Consultar agenda
#### Endpoint: 
```yaml
http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/scheduleCheck.php
```
#### Request:
```yaml
{
   "idUsuario" : "12345678"
}
```
#### Response:
```yaml
{
    "idUsuario": "12345678",
    "fechaV1": "2021.04.11",
    "fechaV2": "2021.05.11"
}
```
## Borrar agenda
#### Endpoint: 
```yaml
http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/scheduleDelete.php
```
#### Request:
```yaml
{
   "idUsuario" : "12345678"
}
```
#### Response(Normal):
```yaml
{
    "message": "Schedule deleted successfully."
}
```
#### Response(Fuera de fecha):
```yaml
{
    "message": "V1 date has already passed, deletion not performed."
}
```
## Consultar cantidad de usuarios agendados por grupo
#### Endpoint:
```yaml
{
 http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/countByGroup.php
}
```
#### Response:
```yaml
{
    "Personal CTI": "15",
    "Hisopadores": "20",
    "Personal Salud General": "18",
    "Personal Educacion": "10",
    "Bomberos": "9",
    "Policia": "19",
    "Personal Residencia": "9"
}
```
## Consultar cantidad de usuarios por grupo de edad

#### Endpoint:
```yaml
{
 http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/countByAge.php
}
```
#### Response:
```yaml
{
    "Entre 18 y 30": "23",
    "Entre 31 y 50": "46",
    "Entre 51 y 65": "31"
}
```