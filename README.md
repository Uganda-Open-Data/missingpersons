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

**Example**

`GET https://dashboard.missingpersonsug.org/api/victims`

```json
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
  
2. Pagination

    You can use the `per_page` URL param to change the number of items returned in a request

    **Example**

    - _Retrieve 25 items_
    
      `GET https://dashboard.missingpersonsug.org/api/victims?per_page=25`

    - _Retrieve 10 items_
    
      `GET https://dashboard.missingpersonsug.org/api/victims?per_page=10`

    ```json
    {
        "links": {
            "first": "https:\/\/missingpersons.test\/api\/victims?page=1",
            "last": "https:\/\/missingpersons.test\/api\/victims?page=3",
            "prev": null,
            "next": "https:\/\/missingpersons.test\/api\/victims?page=2"
          }, 
          "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 3,
            "links": [
              {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
              },
              {
                "url": "https:\/\/missingpersons.test\/api\/victims?page=1",
                "label": "1",
                "active": true
              },
              {
                "url": "https:\/\/missingpersons.test\/api\/victims?page=2",
                "label": "2",
                "active": false
              },
              {
                "url": "https:\/\/missingpersons.test\/api\/victims?page=3",
                "label": "3",
                "active": false
              },
              {
                "url": "https:\/\/missingpersons.test\/api\/victims?page=2",
                "label": "Next &raquo;",
                "active": false
              }
            ],
            "path": "https:\/\/missingpersons.test\/api\/victims",
            "per_page": 50,
            "to": 50,
            "total": 125
          }
        }
     ```

3. Sorting items

    You can sort the returned items by name in ascending or descending order

    Use the `sort` URL param with either `name` or `-name` in the value

    **Examples:**

    - _Ascending order_
    
      `GET https://dashboard.missingpersonsug.org/api/victims?sort=name`

    - _Descending order_
      
      `GET https://dashboard.missingpersonsug.org/api/victims?sort=-name`

4. Pagination is also provided under the `links` and `meta` elements providing counts of the records, which page a user is on etc

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

5. Filtering

    The API supports Associative Array notation to filter.
    
    Use the `filter[key]` URL param to return specific items

    Where the `key` can be replaced with `status` or `holding_location_id`

    `filter[key]` supports one of the following options. 
      
    - status: `filter[status] = Remanded or Arrested or Missing or Released or Fallen`

    - holding_location_id: `filter[holding_location_id] = 1`
      
    **Examples:**

    - _Filter by status_

        Remanded
        
        `GET https://dashboard.missingpersonsug.org/api/victims?filter[status]=Remanded`

        Arrasted
        
        `GET https://dashboard.missingpersonsug.org/api/victims?filter[status]=Arrested`

    - _Filter by Holding Location_

        Holding Location
        
        `GET https://dashboard.missingpersonsug.org/api/victims?filter[holding_location_id]=1`
