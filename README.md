# State Machine

The propose of this project is provide an API to manage transactions between two endpoints. The operations between endpoints isn't provided, being necessary a mediator for this.

## Running this project

To run this project just run commands below:

```
$ docker-compose up -d
$ docker-compose exec php vendor/bin/phinx migrate -e development
```

## Initiating a transaction

By default, this project will run in `http://localhost:8080`. You can create a new transaction through the endpoint `/v1/transaction/`, as the following example: 

``
POST /v1/transaction

{
  "type": "operation_irrigate_plant",
  "status": "trying_to_get_water"
}

HTTP/1.1 201 Created

{
  "transaction_id": "f2dd028410f011e793ae92361f002671",
  "type": "operation_irrigate_plant",
  "status": "trying_to_get_water",
  "created": "2017-03-30 14:12:02",
  "updated": null
}
```

## Getting a transaction

Getting a existing transaction:

```
GET /v1/transaction/f2dd0284-10f0-11e7-93ae-92361f002671

HTTP/1.1 200 Ok

{
  "transaction_id": "f2dd028410f011e793ae92361f002671",
  "type": "operation_irrigate_plant",
  "status": "trying_to_get_water",
  "created": "2017-03-30 14:12:02",
  "updated": null
}
```

## Updating a transaction

You can update transaction sending a PUT request, as the following example:

```
PUT /v1/transaction/f2dd0284-10f0-11e7-93ae-92361f002671

{
  "status": "trying_to_water_the_plant"
}


HTTP/1.1 200 Ok

{
  "transaction_id": "f2dd028410f011e793ae92361f002671",
  "type": "operation_irrigate_plant",
  "status": "trying_to_get_water",
  "created": "2017-03-30 14:12:02",
  "created": "2017-03-30 14:17:24"
}
```
