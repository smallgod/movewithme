# movewithme
New version of movewith me

#Booking Search API::
  URL -> http://192.168.1.38:8080

#Sample Request
{
    "method": "GET_HOTELS",
    "credentials": {
        "app_id": "ADER6864g25644777",
        "api_password": "sLA84009rw2",
        "token_id": "84938urj9338203u349393"
    },
    "params": {
        "interests": [
            74848,
            74849
        ],
        "destination_country": [
            "UG",
            "KE",
            "TZ"
        ]
    }
}

#Sample Response:

{
    "success": true,
    "data": [
        {
          "hotel_id":78904,
          "name": "The Toren",
          "hotel_important_information": "Please note that a tourism tax of 6% will be charged for reservations starting from 01 January 2018. This is not included in the room rate. The credit card that has been used to book a non-refundable rate, will be charged on the day of booking and needs to be presented upon check-in. In case the credit card owner is not traveling with you, an online payment link will be sent to prepay your stay. Please note that the hotel pre-authorizes your credit card with the amount for the first night, 8 days prior to arrival. This is not a payment and this only applies to flexible rates. For reservations of 4 nights and more, different cancellation policies may apply. Some room types offer smoking rooms. There will be an additional smoking fee upon check-out of EUR 25.00 per stay per room. Parking in Amsterdam is challenging, there are parking garages near to the hotel or a valet service is possible to arrange upon request. Charges are applicable. Please contact the hotel ahead of time for information",
          "hotel_description": "The Toren features elegant accommodation alongside the famous Keizersgracht canal, around the corner from the Anne Frank House. It offers elegant rooms with flat-screen TVs with digital entertainment system. Each air-conditioned room at the Toren has an en suite bathroom with a bathtub. They have classic decorations such as chandeliers and ceiling paintings. Coffee and tea making facilities are also provided in every room. In the morning, guests can enjoy a delightful breakfast buffet in the elegant breakfast room with views of the Keizersgracht. The trendy hotel bar serves refreshing drinks during the day. Westermarkt Tram Stop is less than 250 metres from the hotel. Dam Square and the Royal Palace are a 10-minute walk away.",
          "hotelier_welcome_message": "Canal building\nThe hotel has two 17th century historical canal buildings. The main building houses the reception and the bar, where breakfast is served every day. The second building is only on a few steps from the main building. The typical features of the canal houses, along with the nostalgic atmosphere, provides the hotel with a traditional charm. Due to the fixed position of both properties several smaller steps are apparent throughout the hotel. In case of mobility challenges and/or concerns a detailed explanation can be provided.",
          "url": "https://www.booking.com/hotel/nl/toren.html",
          "address": "Keizersgracht 164",
          "zip": "1015 CZ",
          "city_id": -2140479, 
          "district_id": 145,
          "country": "nl",
          "location": {
            "latitude": 52.37586,
            "longitude": 4.88601
          },
          "photos": [
              "https://aff.bstatic.com/images/hotel/max500_watermarked_standard_bluecom/cdb/cdb349a664056697c55c4f0a1ba446722cda8da6.jpg",
              "https://aff.bstatic.com/images/hotel/max500_watermarked_standard_bluecom/b48/b48801fcd30f2b58f28319c72b5a51960b0e2af3.jpg"
          ],
          "number_of_rooms": 38
        }
    ]
}
