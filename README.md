<p align="center"><a href="https://missingpersonsug.org/" target="_blank"><img src="public/media/image_of_person.jpg" width="400" alt="Missing Person in Uganda"></a></p>

## Missing persons in Uganda Backend
This is a backend for the Missing persons UG which mirrors the official data file at https://github.com/wkambale/missingpersons/blob/main/data.json

## How to setup
It's a Laravel Project so the defaults apply and the requirements are:

1. PHP 8.2
2. MySQL 5.7 or 8.x

## Usage

The Base URL is `https://dashboard.missingpersonsug.org/api/`

The endpoint point is `victims`

The API returns 50 items for each request

1. To retrieve victims, make an HTTP GET request to the Base URL and Endpoint

    **Example**

    `GET https://dashboard.missingpersonsug.org/api/victims`

    Expect JSON data in the following structure

    ```
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
  
2. Limiting returned items

    You can use the `per_page` URL param to change the number of items returned in a request

    **Example**

    - _Retrieve 25 items_
    
      `GET https://dashboard.missingpersonsug.org/api/victims?per_page=25`

    - _Retrieve 10 items_
    
      `GET https://dashboard.missingpersonsug.org/api/victims?per_page=10`

3. Sorting items

    You can sort the returned items by name in ascending or descending order

    Use the `sort` URL param with either `name` or `-name` in the value

    **Examples:**

    - _Ascending order_
    
      `GET https://dashboard.missingpersonsug.org/api/victims?sort=name`

    - _Descending order_
      
      `GET https://dashboard.missingpersonsug.org/api/victims?sort=-name`

4. Filtering

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
