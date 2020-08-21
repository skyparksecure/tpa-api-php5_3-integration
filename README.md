# TPA API - php5.3 version

## Caution!

This is our throwaway integration with TravelParkingApps ([Docs](https://www.travelparkingapps.com/api/docs/)) made in PHP 5.3 
for debugging and testing purposes. We do not recommend in any way to use it in production, however you can find use in many
of this files - example workflows or set up DTO clases (_Webservices/Models/_).

#### General info
  
- scripts were run with docker (with PHP 5.3 pre setup)
- many of the "test runs" will output a lot of logs by default
- you'll see a lot of commented out code - as a debugging and test platform, most of it works and just wasn't used for a
particular test


# OLD REAMDE:
## Testing script with Docker

<p>
The docker testing is possible by building and running a predefined image (recipe in Dockerfile). To do this, just run the <code>./test5_3</code> script. The script tries by default to run the <strong>index.php</strong> in the root of this project. Files included in image are:  
<ul>
<li>./Webservices (directory + contents)</li>
<li>./*.php</li>
</ul>
</p>

<p>
The script accepts also an argument with the name of the file that will be run in the container. Examples:
<ul>
<li><code>./test5_3</code> - index.php will be tested</li>
<li><code>./test5_3 test.php</code> - test.php will be tested</li>
<li><code>./test5_3 generate_quote_from_search.php</code> - generate_quote_from_search.php will be tested</li>
<li>etc.</li>
</ul>
</p>
<hr>

\[25.02.2019 11:35] Available files:
<ol>
<li>index.php</li>
<li>all_airports.php</li>
<li>generate_booking.php</li>
<li>generate_quote_from_search.php</li>
<li>retrieve_booking.php</li>
<li>search_availability.php</li>
<li>airport_by_code.php</li>
<li>all_airports_by_country_code.php</li>
<li>all_countries.php</li>
<li>all_ports.php</li>
<li>get_airport_reviews.php</li>
<li>organisation_statistics_by_lang.php</li>
<li>terms_aena.php</li>
<li>get_service_provider.php</li>
<li>get_service_providers.php</li>
<li>with_advanced_exception_handling.php (this one uses ApiTestClass.php - just as an example)</li>
<li>test.php</li>
</ol>
