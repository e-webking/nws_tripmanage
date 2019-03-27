
plugin.tx_nwstripmanage_nwstrip {
  view {
    templateRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_nwstripmanage_nwstrip.view.templateRootPath}
    partialRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_nwstripmanage_nwstrip.view.partialRootPath}
    layoutRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_nwstripmanage_nwstrip.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_nwstripmanage_nwstrip.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_nwstripmanage_nwcurrentstrip {
  view {
    templateRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_nwstripmanage_nwcurrentstrip.view.templateRootPath}
    partialRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_nwstripmanage_nwcurrentstrip.view.partialRootPath}
    layoutRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_nwstripmanage_nwcurrentstrip.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_nwstripmanage_nwcurrentstrip.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_nwstripmanage_nwtripfinder {
  view {
    templateRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_nwstripmanage_nwtripfinder.view.templateRootPath}
    partialRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_nwstripmanage_nwtripfinder.view.partialRootPath}
    layoutRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_nwstripmanage_nwtripfinder.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_nwstripmanage_nwtripfinder.persistence.storagePid}
    #recursive = 1
  }
  settings {
    nwtripfinderId = {$plugin.tx_nwstripmanage_nwtripfinder.settings.nwtripfinderId}
    nwtripListId = {$plugin.tx_nwstripmanage_nwtripfinder.settings.nwtripListId}
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_nwstripmanage_nwtripbooking {
  view {
    templateRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_nwstripmanage_nwtripbooking.view.templateRootPath}
    partialRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_nwstripmanage_nwtripbooking.view.partialRootPath}
    layoutRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_nwstripmanage_nwtripbooking.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_nwstripmanage_nwtripbooking.persistence.storagePid}
    #recursive = 1
  }
  settings {
    paypalBusinessEmailId = {$plugin.tx_nwstripmanage_nwtripbooking.settings.paypalBusinessEmailId}
    paypalSandbox = {$plugin.tx_nwstripmanage_nwtripbooking.settings.paypalSandbox}
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_nwstripmanage._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-nws-tripmanage table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-nws-tripmanage table th {
        font-weight:bold;
    }

    .tx-nws-tripmanage table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

# Module configuration
module.tx_nwstripmanage_web_nwstripmanagenwstriplist {
  persistence {
    storagePid = {$module.tx_nwstripmanage_nwstriplist.persistence.storagePid}
  }
  view {
    templateRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Backend/Templates/
    templateRootPaths.1 = {$module.tx_nwstripmanage_nwstriplist.view.templateRootPath}
    partialRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Backend/Partials/
    partialRootPaths.1 = {$module.tx_nwstripmanage_nwstriplist.view.partialRootPath}
    layoutRootPaths.0 = EXT:nws_tripmanage/Resources/Private/Backend/Layouts/
    layoutRootPaths.1 = {$module.tx_nwstripmanage_nwstriplist.view.layoutRootPath}
  }
}
