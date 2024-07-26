<p align="center"><a href="https://missingpersonsug.org/" target="_blank"><img src="public/media/image_of_person.jpg" width="400" alt="Missing Person in Uganda"></a></p>

## Missing persons in Uganda Backend

This is a backend for the Missing persons UG which mirrors the official data file
at https://github.com/wkambale/missingpersons/blob/main/data.json

## How to setup

It's a Laravel Project so the defaults apply and the requirements are:

1. PHP 8.2
2. MySQL 5.7 or 8.x

## API Usage

The api base url is `https://dashboard.missingpersonsug.org/api/`

### Victims

The list of victims
`https://dashboard.missingpersonsug.org/api/victims`

That returns the data of all the missing persons in the format below

``` json
{
      "data": [
        {
            "id": 1,
            "name": "Jean Namukasa",
            "nickname": "Mama Jean",
            "gender": "Female",
            "x_handle_full": "https:://x.com/jean",
            "x_handle": "@jean",
            "photo_url": "https://dashboard.missingpersonsug.org/media/reign_maulana.jpg",
            "status": "Arrested",
            "holding_location": "Jinja Road Police Station ",
            "security_organ": "Police",
            "status_date": "Wed, Jul 24, 2024 9:30 AM",
            "notes": "Was taken away in a drone"
        }
      ]
}
```

The API end-point also provides sorting, filtering and limiting the number of records returned as follows:

1. 50 records will be returned per page by default which can be changed by using the per_page query parameter
   e.g., `per_page=25` returns 25 records per page
2. Sorting will be by field, sent as a request parameter for example `sort=name` which sorts in ascending order, adding
   a '-' sorts in descending order e.g., `sort=-name`
3. Filtering is done by an array in the request parameters
   e.g., `?filter[status]=Remanded&filter[holding_location_id]=1`
4. Pagination is also provided under the `meta` element providing counts of the records, which page a user is on etc

### Status

The available status values, at `https://dashboard.missingpersonsug.org/api/status`

```json
{
    "data": [
        "Missing",
        "Arrested",
        "Fallen",
        "Kidnapped",
        "Found",
        "Unknown",
        "Remanded",
        "Released"
    ]
}

```

### Gender

The available gender values, at `https://dashboard.missingpersonsug.org/api/gender`

```json
{
    "data": [
        "Male",
        "Female"
    ]
}

```

### Holding Locations

The locations at which different actions happened, at `https://dashboard.missingpersonsug.org/api/holding-locations`

```json
{
    "data": [
        {
            "id": 1,
            "name": "Unknown",
            "description": null,
            "officer_in_charge": null,
            "location_pin": null
        }
    ]
}

```

### Security Organs

The security organs which were involved with the victims, at `https://dashboard.missingpersonsug.org/api/security-organs`

```json
{
    "data": [
        {
            "id": 1,
            "name": "Unknown",
            "description": null
        }
    ]
}

```

### Victim Statistics

This is a summary of statistics on the victims at `https://dashboard.missingpersonsug.org/api/victim-statistics`

```json
{
    "data": {
        "gender": {
            "Male": 102,
            "Female": 23
        },
        "status": {
            "Released": 17,
            "Remanded": 80,
            "Arrested": 27,
            "Missing": 1
        },
        "security_organs": {
            "Police": 120,
            "Joint Forces": 4,
            "Unknown": 1
        },
        "holding_locations": {
            "Luzira Prison": 76,
            "Unknown": 24,
            "Kampala CPS": 3,
            "Parliamentary Avenue Police Station": 2,
            "Kiira Road Police Station": 1,
            "Kitalya": 1,
            "Jinja Road Police Station": 1,
            "Natete Police Station": 1
        }
    }
}

```


