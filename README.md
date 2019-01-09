# SOAPClientPHPWSHttpBinding
Conectar codigo de PHP con WCF Service con binding wshttpbinding usando SoapClient <br />

# index.php
Se debe montar sobre un motor apache de PHP Version 7 en lo posible

# web.config 
Crear un proyecto WCF en Visual Studio llamado Middleware para .NET Standard y copiar y remplazar con los archivos de la carpeta <br />
Lo que se necesita para que funcione la llamada al metodo SOAP es tener las siguientes tags: <br />

`<wsHttpBinding> 
        <binding name="wsSecureBinding">
          <security mode="TransportWithMessageCredential" >
            <message clientCredentialType="UserName" establishSecurityContext="false"  />
          </security>
        </binding>
      </wsHttpBinding>` 

# SOAPUI
Para probar el servicio con SOAPUI seguir los siguientes pasos: <br />
1. Crear proyecto de SOAPUI: Colocar en Initial WSDL la ruta del servicio agregando "?wsdl" (service.svc?wsdl)
2. Boton Derecho sobre el servicio -> Show Interface Viewer -> Solapa Service Endpoints -> Colocar username password y wss-type (PasswordText)
3. Abrir un request de uno de los metodos -> Solapa WS-A -> Tildar Enable WS-A addressing, Add default wsa:Action y Add default wsa:To
