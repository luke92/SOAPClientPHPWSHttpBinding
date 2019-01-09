using System;
using System.Configuration;
using System.IdentityModel.Selectors;
using System.IdentityModel.Tokens;

namespace Middleware
{
    public class ServiceAuthenticator : UserNamePasswordValidator
    {
        public override void Validate(string username, string password)
        {
            if (string.IsNullOrWhiteSpace(username))
                throw new ArgumentNullException((username));
            if (string.IsNullOrWhiteSpace(password))
                throw new ArgumentNullException((password));
            if (username != ConfigurationManager.AppSettings["username"] ||
                password != ConfigurationManager.AppSettings["password"])
                throw new SecurityTokenException("User or Password unknown");
        }
    }

}