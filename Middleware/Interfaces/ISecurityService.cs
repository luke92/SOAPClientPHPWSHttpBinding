using System;
using System.ServiceModel;
using Middleware.Modules.Security.Models;

namespace Middleware.Interfaces
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the interface name "ISecurityService" in both code and config file together.
    [ServiceContract]
    public interface ISecurityService
    {
        [OperationContract]
        DataWrapper GetDocuments();

    }

}
