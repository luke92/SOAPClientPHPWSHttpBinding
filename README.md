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

