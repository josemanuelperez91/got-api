# Game of Thrones Characters API Rest

This API REST serves multiple endpoins where you can save and retrieve character and actors data from the TV series Game of Thrones.

## Installation:

In order to run the service it is necessary to have docker and docker compose installed.

```
sudo apt update
sudo apt install docker
sudo apt install docker-compose
```
After everything is ready you can run the script install.sh, it will handle everything:

```
./install.sh
```

If everything goes well, the API service will be up and ready to receive HTTP calls at this local address:  

**localhost:8080**

## API ENDPOINTS

As a CRUD API, the endpoints are the usual GET, POST, PUT and DELETE, plus a search endpoint:

### /api/characters

Ex. `http://localhost:8080/api/characters`

#### GET

Returns a complete list of characters stored in the database, with their associated actors.

___

#### POST
Allows to save a new character. At least a JSON body the parameter **characterName** is required.

```json
{
"characterName": "test",
    "killed":
    [
        "test2"
    ]
}
```
### /api/characters/{id}

Ex. `http://localhost:8080/api/characters/1`

#### GET

Returns the specific character data associated with id parameter.
___
#### PUT

Allows to update the specific character. At least a JSON body with one data-related parameter is required.
___
#### DELETE

DELETES the specific character data associated with {id} argument.

### /api/characters/search/{string}

Ex. `http://localhost:8080/api/characters/search/arya`

Searchs for a character that contains in its characterName the {string} value.

### /api/actors

Ex. `http://localhost:8080/api/actors`

#### GET

Returns a complete list of actors stored in the database, with their associated actors.

___

#### POST
Allows to save a new actor. At least a JSON body the parameter **actorName**  and its associated **characterID** are required.

```json
{
"actorName": "test",
"characterID": 1
}
```
### /api/actors/{id}

Ex. `http://localhost:8080/api/actors/1`

#### GET

Returns the specific actor data associated with id parameter.
___
#### PUT

Allows to update the specific actor. At least a JSON body with one data-related parameter is required.
___
#### DELETE

DELETES the specific actor data associated with {id} argument.

### /api/actors/search/{string}

Ex. `http://localhost:8080/api/actors/search/Maisie`

Searchs for a actor that contains in its actorName the {string} value.