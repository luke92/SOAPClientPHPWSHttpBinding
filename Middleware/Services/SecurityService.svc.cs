using System;
using Middleware.AutoAdmision;
using Middleware.Interfaces;
using Middleware.Modules.Security;
using Middleware.Modules.Security.Models;

namespace Middleware.Services
{
    public class SecurityService : ISecurityService
    {
        private readonly SecurityModule _module;

        public SecurityService()
        {
            _module = new SecurityModule();
        }
        public DataWrapper GetDocuments()
        {
            try
            {
                return _module.GetDocuments();
            }
            catch (Exception e)
            {
                return new DataWrapper()
                {
                    List = null,
                    Estado = _module.GetDocumentsExcepcion(e.Message)
                };
            }
        }

        
    }
}
