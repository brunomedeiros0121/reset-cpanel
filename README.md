# reset-cpanel
Software para reboot de serviços via API para  servidores cPanel.

Versão 1.0.

Desenvolvido para fins de aprendizado.
O software é responsável por executar a conexão com um servidor cPanel via API, assim realizando o reboot dos serviços instalados no servidor.
Ex :  http,Mysql,POP3,Exim dentre vários outros, onde pode ser encontrados nesta link https://documentation.cpanel.net/display/60Docs/WHM+Scripts .

A API aceita dois tipo de entradas, xml e json, a documentação mesmo aconselha que seja utilizado o json para as conexões.
Como está é a primeira versão ainda existem bugs ou pequenos detalhes a serem melhorias a serem feitas.
Lembrando que para um bom funcionamento, o software deve ser utilizado em uma hospedagem, pois determinados servidores não aceitam a conexões de hosts externos.
Críticas, sugestões e elogios são bem vindos!
Toda a parte da documentação pode ser encontrada nos links abaixo.

Referencias  : 
https://documentation.cpanel.net/display/SDK/WHM+API+1+Functions+-+restartservice   
https://documentation.cpanel.net/display/SDK/WHM+API+0+Functions+-+restartservice 
https://documentation.cpanel.net/display/60Docs/Restart+Services 
https://forums.cpanel.net/threads/xml-api-restartservice.107413/ 
https://pt.slideshare.net/MarcioJuniorVieira/criando-e-consumindo-webservice-rest-com-php-e-json 
http://jsonapi.org/examples/ 
https://forum.imasters.com.br/topic/413712-automa%C3%A7%C3%A3ocom-api-cpanel-whm/ 
