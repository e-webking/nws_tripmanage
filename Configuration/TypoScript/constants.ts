
plugin.tx_nwstripmanage_nwstrip {
  view {
    # cat=plugin.tx_nwstripmanage_nwstrip/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:nws_tripmanage/Resources/Private/Templates/
    # cat=plugin.tx_nwstripmanage_nwstrip/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:nws_tripmanage/Resources/Private/Partials/
    # cat=plugin.tx_nwstripmanage_nwstrip/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:nws_tripmanage/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_nwstripmanage_nwstrip//a; type=string; label=Default storage PID
    storagePid =
  }
}

plugin.tx_nwstripmanage_nwcurrentstrip {
  view {
    # cat=plugin.tx_nwstripmanage_nwcurrentstrip/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:nws_tripmanage/Resources/Private/Templates/
    # cat=plugin.tx_nwstripmanage_nwcurrentstrip/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:nws_tripmanage/Resources/Private/Partials/
    # cat=plugin.tx_nwstripmanage_nwcurrentstrip/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:nws_tripmanage/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_nwstripmanage_nwcurrentstrip//a; type=string; label=Default storage PID
    storagePid =
  }
}

plugin.tx_nwstripmanage_nwtripfinder {
  view {
    # cat=plugin.tx_nwstripmanage_nwtripfinder/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:nws_tripmanage/Resources/Private/Templates/
    # cat=plugin.tx_nwstripmanage_nwtripfinder/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:nws_tripmanage/Resources/Private/Partials/
    # cat=plugin.tx_nwstripmanage_nwtripfinder/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:nws_tripmanage/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_nwstripmanage_nwtripfinder//a; type=string; label=Default storage PID
    storagePid =
  }
  settings {
    # cat=plugin.tx_nwstripmanage_nwtripfinder/settings/0001; type=int+; label= Trip Finder PageID
    nwtripfinderId =

    # cat=plugin.tx_nwstripmanage_nwtripfinder/settings/0002; type=int+; label= Trip List PageID
    nwtripListId =
  }
}

plugin.tx_nwstripmanage_nwtripbooking {
  view {
    # cat=plugin.tx_nwstripmanage_nwtripbooking/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:nws_tripmanage/Resources/Private/Templates/
    # cat=plugin.tx_nwstripmanage_nwtripbooking/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:nws_tripmanage/Resources/Private/Partials/
    # cat=plugin.tx_nwstripmanage_nwtripbooking/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:nws_tripmanage/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_nwstripmanage_nwtripbooking//a; type=string; label=Default storage PID
    storagePid =
  }
  settings {
    # cat=plugin.tx_nwstripmanage_nwtripbooking/settings/0001; type=boolean; label= PayPal Sandbox Mode Enabled
    paypalSandbox = 1
    # cat=plugin.tx_nwstripmanage_nwtripbooking/settings/0002; type=string; label= PayPal Business Emaill Address
    paypalBusinessEmailId = 
  }
}

module.tx_nwstripmanage_nwstriplist {
  view {
    # cat=module.tx_nwstripmanage_nwstriplist/file; type=string; label=Path to template root (BE)
    templateRootPath = EXT:nws_tripmanage/Resources/Private/Backend/Templates/
    # cat=module.tx_nwstripmanage_nwstriplist/file; type=string; label=Path to template partials (BE)
    partialRootPath = EXT:nws_tripmanage/Resources/Private/Backend/Partials/
    # cat=module.tx_nwstripmanage_nwstriplist/file; type=string; label=Path to template layouts (BE)
    layoutRootPath = EXT:nws_tripmanage/Resources/Private/Backend/Layouts/
  }
  persistence {
    # cat=module.tx_nwstripmanage_nwstriplist//a; type=string; label=Default storage PID
    storagePid =
  }
}
