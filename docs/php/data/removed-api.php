<?php
/**
 * Base de connaissances — Version 1.0.0
 *
 * La version ci-dessus provient de la constante PS9COMPATIBLE_DATA_VERSION du
 * scanner (source unique de vérité) : ce fichier est généré, ne le modifiez pas
 * à la main. Régénérez-le avec tools/build-data.php.
 *
 * DESCRIPTION GÉNÉRALE :
 * Ce fichier contient la liste de ce qui a disparu de l'API publique du core
 * PrestaShop, avec la version dans laquelle l'élément a disparu. Il est chargé
 * par Ps9Scanner::loadKnowledge() et alimente toutes les vérifications de
 * compatibilité du scanner.
 *
 * CONTENU :
 *   - classes supprimées (erreur)
 *   - méthodes supprimées, globales et par namespace (erreur)
 *   - constantes de classe supprimées (erreur)
 *   - hooks supprimés (avertissement)
 *   - présentateurs déplacés, avec leur nouveau namespace (erreur)
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   1.0.0
 * @package   Ps9Compatible
 *
 * GÉNÉRÉ PAR :
 *   php tools/build-data.php <src-1.7.8> <src-8.2> <src-9.0>
 *
 * Sources comparées : PrestaShop 1.7.8, 8.2 et 9.0.
 */
return array (
  'generated' => '2026-10-02',
  'compared' => 
  array (
    0 => '1.7.8',
    1 => '8.2',
    2 => '9.0',
  ),
  'classes' => 
  array (
    'AdminAttributeGeneratorController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'AdminAttributesGroupsController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminCartsController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminFeaturesController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminGendersController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminImagesController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminLegacyLayoutController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminLoginController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminModulesController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminPatternsController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'AdminProductsController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminReferrersController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'AdminRequestSqlController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminSearchEnginesController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'AdminStatesController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminStatusesController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'AdminSuppliersController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'Attribute' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'FileUploader' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'OrderDiscount' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PhpEncryptionLegacyEngine' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopAutoload' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Api\\Api' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Api\\Resource\\HookStatus' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Hook\\QueryResult\\HookStatus',
    ),
    'PrestaShopBundle\\Api\\StateProvider\\HookStatusProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\ControllerConfiguration' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\ControllerConfigurationFactory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\FrameworkBridgeControllerInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\FrameworkBridgeControllerListTrait' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\FrameworkBridgeControllerTrait' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\LegacyControllerBridge' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\LegacyControllerBridgeFactory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\LegacyControllerBridgeInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\AdminController\\Listener\\InitFrameworkBridgeControllerListener' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Exception\\BridgeException' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Exception\\FailedToFetchListRecordsException' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Helper\\Listing\\FilterPrefix' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Helper\\Listing\\FiltersProcessor' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Helper\\Listing\\HelperBridge\\FeatureHelperListBridge' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Helper\\Listing\\HelperBridge\\HelperListBridge' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Helper\\Listing\\HelperListConfiguration' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Helper\\Listing\\HelperListConfigurationFactory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\BreadcrumbsAndTitleConfigurator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\ConfiguratorInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\FooterConfigurator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\FrameworkControllerSmartyTrait' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\HeaderConfigurator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\ModalConfigurator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\NotificationsConfigurator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\SmartyBridge' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Bridge\\Smarty\\ToolbarFlagsConfigurator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Cache\\Factory\\CacheSubscriberFactory' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Cache\\ModuleTemplateCacheWarmer' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Command\\SecurityAnnotationLinterCommand' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\AddonsController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\AttachementProductController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\AttributeController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\CategoryController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\CombinationController' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\Product\\CombinationController',
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\AuthorizationServer\\ApiAccessController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\AuthorizationServer\\ApplicationController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\FeatureController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\Design\\ThemeCatalogController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\Modules\\AddonsStoreController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\Shipping\\CarriersController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\MultistoreController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\ProductController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\ProductImageController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\ActionsBarButton' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Action\\ActionsBarButton',
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\ActionsBarButtonInterface' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Action\\ActionsBarButtonInterface',
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\ActionsBarButtonsCollection' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Action\\ActionsBarButtonsCollection',
    ),
    'PrestaShopBundle\\Controller\\Admin\\SpecificPriceController' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\Product\\SpecificPriceController',
    ),
    'PrestaShopBundle\\Controller\\Admin\\StockController' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\SupplierController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\TranslationsController' => 
    array (
      0 => '8.0',
      1 => 'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TranslationsController',
    ),
    'PrestaShopBundle\\Controller\\Admin\\VirtualProductController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\Admin\\WarehouseController' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Controller\\ArgumentResolver\\SearchParametersResolver' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\DependencyInjection\\Compiler\\ContainerInjectionPass' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\DependencyInjection\\Compiler\\OverrideTwigServiceCompilerPass' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Entity\\ApiAccess' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Entity\\AuthorizedApplication' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Entity\\Repository\\ApiAccessRepository' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Entity\\Repository\\AuthorizedApplicationRepository' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\EventListener\\AccessDeniedListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Admin\\AccessDeniedListener',
    ),
    'PrestaShopBundle\\EventListener\\BackUrlRedirectResponseListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Admin\\BackUrlRedirectResponseListener',
    ),
    'PrestaShopBundle\\EventListener\\DemoModeEnabledListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Admin\\DemoModeEnabledListener',
    ),
    'PrestaShopBundle\\EventListener\\LegacyParametersListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Admin\\LegacyParametersListener',
    ),
    'PrestaShopBundle\\EventListener\\LegacyUrlListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Admin\\LegacyUrlListener',
    ),
    'PrestaShopBundle\\EventListener\\ModuleActivatedListener' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\EventListener\\MultishopCommandListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Console\\MultishopCommandListener',
    ),
    'PrestaShopBundle\\EventListener\\ShopConstraintListener' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\EventListener\\TokenizedUrlsListener' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\EventListener\\Admin\\TokenizedUrlsListener',
    ),
    'PrestaShopBundle\\EventListener\\UserLocaleListener' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Event\\ModuleZipManagementEvent' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\PerformanceFormHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Category\\SimpleCategory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\FeatureFlag\\EventListener\\FeatureFlagTypeListener' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\FeatureFlag\\FeatureFlagsType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\RequestSql\\SqlRequestFormDataProvider' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\DataProvider\\SqlRequestFormDataProvider',
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\RequestSql\\SqlRequestFormHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\OrderPreferences\\OrderPreferencesFormDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\ProductPreferencesFormDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\MetaSettingsFormDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\AlertExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\AlertExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\AlertsTrackingExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\AlertsTrackingExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\ColumnsNumberExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\ColumnsNumberExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\CommaTransformerExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\CommaTransformerExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\DefaultEmptyDataExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\DefaultEmptyDataExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\DisablingSwitchExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\DisablingSwitchExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\DisablingSwitchTrait' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\DisablingSwitchTrait',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\DownloadFileExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\DownloadFileExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\ExternalLinkExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\ExternalLinkExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\FormThemeExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\FormThemeExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\HelpTextExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\HelpTextExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\HintTextExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\HintTextExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\LabelOptionsExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\LabelOptionsExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\ModifyAllShopsExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\ModifyAllShopsExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\MultistoreConfigurationTypeExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\MultistoreConfigurationTypeExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\MultistoreExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\MultistoreExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\RowAttributesExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\RowAttributesExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Extension\\UnitTypeExtension' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Extension\\UnitTypeExtension',
    ),
    'PrestaShopBundle\\Form\\Admin\\Feature\\ProductFeature' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Geolocation\\GeolocationFormDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Improve\\Shipping\\Preferences\\PreferencesFormDataProvider' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\General\\PreferencesFormDataProvider',
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductAttachement' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductCategories' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductCombination' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductCombinationBulk' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductCustomField' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductInformation' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductOptions' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\QueryResult\\ProductOptions',
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductPrice' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductQuantity' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductSeo' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductShipping' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductSpecificPrice' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductSupplierCombination' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductVirtual' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Product\\ProductWarehouseCombination' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Basic\\BasicType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Basic\\FeatureValueType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Basic\\FeaturesType' => 
    array (
      0 => '8.0',
      1 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Details\\FeaturesType',
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Basic\\ManufacturerType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Category\\CategoriesCollectionType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\DataTransformer\\TypeaheadRedirectionTargetTransformer' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Description\\RelatedProductType' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\EventListener\\FeatureValueListener' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Options\\CustomizationsType' => 
    array (
      0 => '8.0',
      1 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Details\\CustomizationsType',
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Options\\ReferencesType' => 
    array (
      0 => '8.0',
      1 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Details\\ReferencesType',
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\ProductFormType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Shortcut\\PriceShortcutType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Shortcut\\ShortcutsType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Shortcut\\StockShortcutType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\AddonsConnectType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\ReductionType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\TextEmptyType' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\TextWithUnitType' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\TextareaEmptyType' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\TranslateTextType' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\TypeaheadProductCollectionType' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\TypeaheadProductPackCollectionType' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Form\\DataTransformer\\MoneyToLocalizedStringTransformer' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Install\\DatabaseDump' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Install\\Upgrade' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Kernel\\ModuleRepository' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Kernel\\ModuleRepositoryFactory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Model\\AdminModelAdapter' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Model\\Product\\AdminModelAdapter' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Routing\\Linter\\SecurityAnnotationLinter' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Security\\Admin\\Employee' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Security\\Annotation\\DemoRestricted' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\Security\\Attribute\\DemoRestricted',
    ),
    'PrestaShopBundle\\Security\\Annotation\\ModuleActivated' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Security\\OAuth2\\Repository\\NullScopeRepository' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Security\\OAuth2\\ResourceServer' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\Cache\\Refresh' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\DataProvider\\Admin\\AddonsInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\DataProvider\\Admin\\ProductInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\DataProvider\\Admin\\RecommendedModules' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\DataProvider\\Marketplace\\ApiClient' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\DataProvider\\StockInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\DataUpdater\\Admin\\ProductInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\Database\\Upgrade' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\Hook\\HookDispatcher' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\ProductService' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Service\\TransitionalBehavior\\AdminPagePreferenceInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Translation\\Provider\\TranslationFinderTrait' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Twig\\AdminExtension' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Twig\\Extension\\MultistoreComponentsExtension' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Twig\\Extension\\MultistoreHeaderExtension' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Twig\\LocaleExtension' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Twig\\Locator\\ModuleTemplateIterator' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Twig\\RawPurifiedExtension' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShopBundle\\Utils\\HTMLPurifier' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\AbstractObjectModelRepository' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Repository\\AbstractObjectModelRepository',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Addons\\AddonsDataProvider' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Address\\AbstractManufacturerAddressHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Admin\\AbstractAdminQueryBuilder' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Admin\\PagePreference' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Attachment\\QueryHandler\\GetAttachmentInformationListHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Attribute\\AdminAttributeGeneratorControllerWrapper' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Cache\\CacheClearer' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Carrier\\AbstractCarrierHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Cart\\CartPresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Cart\\CartPresenter',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Category\\CommandHandler\\DeleteCategoryMenuThumbnailImageHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\ClassLang' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\CombinationDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Country\\AbstractCountryHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Currency\\CommandHandler\\ToggleExchangeRateAutomatizationHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\CustomerService\\CommandHandler\\AddOrderCustomerMessageHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\CustomerService\\CommandHandler\\AddOrderCustomerMessageHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\CustomerService\\CommandHandler\\ForwardCustomerThreadHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\CustomerService\\CommandHandler\\ForwardCustomerThreadHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\CustomerService\\CommandHandler\\ReplyToCustomerThreadHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\CustomerService\\CommandHandler\\ReplyToCustomerThreadHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\CustomerService\\QueryHandler\\GetCustomerThreadForViewingHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\CustomerService\\QueryHandler\\GetCustomerThreadForViewingHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Feature\\FeatureDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Image\\Uploader\\CategoryMenuThumbnailUploader' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\ModulePresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Module\\ModulePresenter',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\ModuleZip' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\ModuleZipManager' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\Presenter\\PaymentModulesPresenter' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Module\\PaymentModulesPresenter',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\PrestaTrust\\ModuleEventSubscriber' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\PrestaTrust\\PrestaTrustChecker' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\TabModuleListProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\News\\NewsDataProvider' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\ObjectPresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Object\\ObjectPresenter',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Order\\OrderPresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Order\\OrderPresenter',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Order\\OrderReturnPresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Order\\OrderReturnPresenter',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Pack\\PackDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AdminProductDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AdminProductDataUpdater' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AdminProductWrapper' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttachmentDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttributeGroup\\AbstractAttributeGroupHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\AttributeGroup\\AbstractAttributeGroupHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttributeGroup\\AttributeGroupViewDataProvider' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\AttributeGroup\\AttributeGroupViewDataProvider',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttributeGroup\\CommandHandler\\BulkDeleteAttributeGroupHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\AttributeGroup\\CommandHandler\\BulkDeleteAttributeGroupHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttributeGroup\\CommandHandler\\DeleteAttributeGroupHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\AttributeGroup\\CommandHandler\\DeleteAttributeGroupHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttributeGroup\\QueryHandler\\AbstractAttributeGroupQueryHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\AttributeGroup\\QueryHandler\\AbstractAttributeGroupQueryHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\AttributeGroup\\QueryHandler\\GetAttributeGroupListHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\AttributeGroup\\QueryHandler\\GetAttributeGroupListHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\RemoveAllAssociatedCombinationSuppliersHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\RemoveCombinationCommandHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\SetCombinationDefaultSupplierHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\SetCombinationSuppliersHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\UpdateCombinationDetailsHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\UpdateCombinationFromListingHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\UpdateCombinationPricesHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\CommandHandler\\UpdateCombinationStockHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\Update\\CombinationRemover' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\AssociateProductAttachmentHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\RemoveAllAssociatedProductAttachmentsHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Product\\Attachment\\CommandHandler\\RemoveAllAssociatedProductAttachmentsHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\SetAssociatedProductAttachmentsHandler' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Product\\Attachment\\CommandHandler\\SetAssociatedProductAttachmentsHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductBasicInformationHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductDetailsHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductOptionsHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductPricesHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductSeoHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductShippingHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductStatusCommandHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\CommandHandler\\UpdateProductStatusHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\FilterCategoriesRequestPurifier' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\ListParametersUpdater' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Options\\RedirectTargetProvider' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\SEO\\RedirectTargetProvider',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\ProductDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\ProductDuplicator' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Product\\Update\\ProductDuplicator',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\SpecificPrice\\CommandHandler\\AddProductSpecificPriceHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\SpecificPrice\\CommandHandler\\SetGlobalSpecificPricePriorityHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\SpecificPrice\\QueryHandler\\GetEditableSpecificPricesListHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Stock\\CommandHandler\\UpdateProductStockInformationHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Supplier\\CommandHandler\\SetProductSuppliersHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Update\\ProductPricePropertiesFiller' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Update\\ProductSeoPropertiesFiller' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Update\\ProductStockProperties' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Product\\Stock\\Update\\ProductStockProperties',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Security\\Admin' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Security\\SslMiddleware' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Shop\\Url\\ProductImageFolderProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\SpecificPrice\\AbstractSpecificPriceHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\SpecificPrice\\CommandHandler\\AddSpecificPriceHandler' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Product\\SpecificPrice\\CommandHandler\\AddSpecificPriceHandler',
    ),
    'PrestaShop\\PrestaShop\\Adapter\\SpecificPrice\\CommandHandler\\DeleteSpecificPriceByCartProductHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\SqlManager\\SqlRequestFormDataValidator' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Supplier\\SupplierDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Tax\\TaxRuleDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Twig\\LocaleExtension' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Warehouse\\WarehouseDataProvider' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\AddonsCollection' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\Login\\Exception\\LoginErrorException' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\Module\\Exception\\UnconfirmedModuleActionException' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\Module\\ModuleInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\Module\\ModuleManager' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleManager',
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\Module\\ModuleRepository' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Addon\\Module\\ModuleRepositoryInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepositoryInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\CommandBus\\Middleware\\CommandRegisterMiddleware' => 
    array (
      0 => '9.0',
      1 => 'PrestaShopBundle\\CommandBus\\Middleware\\CommandRegisterMiddleware',
    ),
    'PrestaShop\\PrestaShop\\Core\\CommandBus\\TacticianCommandBusAdapter' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Attachment\\QueryHandler\\GetAttachmentsForListingHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Attachment\\Query\\GetAttachmentInformationList' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRule' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRuleActions' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRuleConditions' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRuleInformation' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRuleMinimum' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRuleReduction' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\QueryResult\\EditableCartRuleRestrictions' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\AmountDiscountAction' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\CartRuleActionBuilder' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\Builder\\CartRule\\CartRuleActionBuilder',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\CartRuleActionBuilderInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\CartRuleActionInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\FreeShippingAction' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\GiftProductAction' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\CartRuleAction\\PercentageDiscountAction' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\MoneyAmountCondition' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\CommandHandler\\DeleteCategoryMenuThumbnailImageHandlerInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\Command\\DeleteCategoryMenuThumbnailImageCommand' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\Exception\\MenuThumbnailsLimitException' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\ValueObject\\MenuThumbnailId' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Currency\\CommandHandler\\ToggleExchangeRateAutomatizationHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Currency\\Command\\ToggleExchangeRateAutomatizationCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Currency\\Exception\\AutomateExchangeRatesUpdateException' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Customer\\QueryResult\\ReferrerInformation' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Customer\\ValueObject\\Email' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\ValueObject\\Email',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Employee\\Exception\\CannotDeleteWarehouseManagerException' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Feature\\Exception\\InvalidFeatureIdException' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\MailTemplate\\CommandHandler\\GenerateThemeMailTemplatesCommandHandler' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\MailTemplate\\CommandHandler\\GenerateThemeMailTemplatesCommandHandlerInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\CommandHandler\\BulkDeleteAttributeHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\CommandHandler\\BulkDeleteAttributeHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\CommandHandler\\DeleteAttributeHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\CommandHandler\\DeleteAttributeHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\Command\\BulkDeleteAttributeCommand' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\Command\\BulkDeleteAttributeCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\Command\\DeleteAttributeCommand' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\Command\\DeleteAttributeCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\Exception\\AttributeConstraintException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\Exception\\AttributeConstraintException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\Exception\\AttributeException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\Exception\\AttributeException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\Exception\\AttributeNotFoundException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\Exception\\AttributeNotFoundException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\Exception\\DeleteAttributeException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\Exception\\DeleteAttributeException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\QueryResult\\Attribute' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Attribute\\ValueObject\\AttributeId' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Attribute\\ValueObject\\AttributeId',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\CommandHandler\\BulkDeleteAttributeGroupHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\CommandHandler\\BulkDeleteAttributeGroupHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\CommandHandler\\DeleteAttributeGroupHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\CommandHandler\\DeleteAttributeGroupHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Command\\BulkDeleteAttributeGroupCommand' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Command\\BulkDeleteAttributeGroupCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Command\\DeleteAttributeGroupCommand' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Command\\DeleteAttributeGroupCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Exception\\AttributeGroupConstraintException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Exception\\AttributeGroupConstraintException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Exception\\AttributeGroupException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Exception\\AttributeGroupException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Exception\\AttributeGroupNotFoundException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Exception\\AttributeGroupNotFoundException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Exception\\DeleteAttributeGroupException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Exception\\DeleteAttributeGroupException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\QueryHandler\\GetAttributeGroupListHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\QueryHandler\\GetAttributeGroupListHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\QueryResult\\AttributeGroup' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Query\\GetAttributeGroupList' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\Query\\GetAttributeGroupList',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\ValueObject\\AttributeGroupId' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\ValueObject\\AttributeGroupId',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\RemoveAllAssociatedCombinationSuppliersHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\RemoveCombinationCommandHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\SetCombinationDefaultSupplierHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\SetCombinationSuppliersHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\UpdateCombinationDetailsHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\UpdateCombinationFromListingHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\UpdateCombinationPricesHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CommandHandler\\UpdateCombinationStockHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\RemoveAllAssociatedCombinationSuppliersCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\RemoveCombinationCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\SetCombinationDefaultSupplierCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\SetCombinationSuppliersCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\UpdateCombinationDetailsCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\UpdateCombinationFromListingCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\UpdateCombinationPricesCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Command\\UpdateCombinationStockCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\QueryResult\\CombinationAttributeInformation' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\CombinationAttributeInformation',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\AssociateProductAttachmentHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\RemoveAllAssociatedProductAttachmentsHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Attachment\\CommandHandler\\RemoveAllAssociatedProductAttachmentsHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\SetAssociatedProductAttachmentsHandlerInterface' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Attachment\\CommandHandler\\SetAssociatedProductAttachmentsHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductBasicInformationHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductDetailsHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductOptionsHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductPricesHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductSeoHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductShippingHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductStatusCommandHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\CommandHandler\\UpdateProductStatusHandlerInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\AssociateProductAttachmentCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\RemoveAllAssociatedProductAttachmentsCommand' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Attachment\\Command\\RemoveAllAssociatedProductAttachmentsCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\SetAssociatedProductAttachmentsCommand' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Attachment\\Command\\SetAssociatedProductAttachmentsCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductBasicInformationCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductDetailsCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductOptionsCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductPricesCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductSeoCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductShippingCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Command\\UpdateProductStatusCommand' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\QueryResult\\ProductCategoriesInformation' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\QueryResult\\ProductRedirectTarget' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\CommandHandler\\AddProductSpecificPriceHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\CommandHandler\\SetGlobalSpecificPricePriorityHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Command\\AddProductSpecificPriceCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Command\\SetGlobalSpecificPricePriorityCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\QueryHandler\\GetEditableSpecificPricesListHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\QueryResult\\SpecificPriceListForEditing' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Query\\GetEditableSpecificPricesList' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Stock\\CommandHandler\\UpdateProductStockInformationHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Stock\\Command\\UpdateProductStockInformationCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Supplier\\CommandHandler\\SetProductSuppliersHandlerInterface' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Supplier\\Command\\SetProductSuppliersCommand' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Supplier\\Exception\\DefaultProductSupplierNotAssociatedException' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Supplier\\ProductSupplier' => 
    array (
      0 => '8.0',
      1 => 'ProductSupplier',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Supplier\\QueryResult\\ProductSupplierInfo' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\CommandHandler\\AddSpecificPriceHandlerInterface' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\CommandHandler\\AddSpecificPriceHandlerInterface',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\CommandHandler\\DeleteSpecificPriceByCartProductHandlerInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Command\\AddSpecificPriceCommand' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Command\\AddSpecificPriceCommand',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Command\\DeleteSpecificPriceByCartProductCommand' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Exception\\CannotAddSpecificPriceException' => 
    array (
      0 => '8.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Exception\\CannotAddSpecificPriceException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Exception\\CannotSetSpecificPricePrioritiesException' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Exception\\CannotSetSpecificPricePrioritiesException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Exception\\SpecificPriceConstraintException' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Exception\\SpecificPriceConstraintException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Exception\\SpecificPriceException' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Exception\\SpecificPriceException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\Exception\\SpecificPriceNotFoundException' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\Exception\\SpecificPriceNotFoundException',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\SpecificPrice\\ValueObject\\SpecificPriceId' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\ValueObject\\SpecificPriceId',
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Title\\Exception\\DeleteTitleException' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Email\\SmtpDataConfigurator' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Email\\SwiftMailerValidation' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\FeatureFlag\\FeatureFlagsModifier' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\ChoiceProvider\\PriceReductionTypeChoiceProvider' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\BasicInformationCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\Combination\\CombinationDetailsCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\Combination\\CombinationPriceCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\Combination\\CombinationStockCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\OptionsCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\PricesCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\SEOCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\ShippingCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\CommandBuilder\\Product\\StockCommandsBuilder' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Form\\IdentifiableObject\\DataHandler\\CombinationItemFormDataHandler' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\AuthorizationServer\\ApiAccessesStatesColumn' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Definition\\Factory\\AuthorizedApplicationGridDefinitionFactory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Query\\AuthorizedApplicationQueryBuilder' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Hook\\HookDispatcherAwareTrait' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Kpi\\Row\\KpiRowFactory' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\ProductCsvExporter' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\ProductExporterInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\ProductInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\ProductListingPresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Product\\ProductListingPresenter',
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\ProductPresenter' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Adapter\\Presenter\\Product\\ProductPresenter',
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\Search\\SortOrderFactory' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Product\\Search\\URLFragmentSerializer' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Search\\Filters\\AuthorizedApplicationsFilters' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Search\\SearchParameters' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Search\\SearchParametersInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Security\\OAuth2\\ResourceServerInterface' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'PrestaShop\\PrestaShop\\Core\\Security\\TokenAuthenticator' => 
    array (
      0 => '9.0',
      1 => 'PrestaShop\\PrestaShop\\Core\\Security\\OAuth2\\TokenAuthenticator',
    ),
    'PrestaShop\\PrestaShop\\Core\\String\\CharacterCleaner' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'QqUploadedFileForm' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'QqUploadedFileXhr' => 
    array (
      0 => '9.0',
      1 => NULL,
    ),
    'Referrer' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'Smarty_CacheResource_Mysql' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
    'Windows' => 
    array (
      0 => '8.0',
      1 => NULL,
    ),
  ),
  'methods' => 
  array (
    'Access' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Address' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getfieldsvalidate' => 
      array (
        0 => 'getFieldsValidate',
        1 => true,
        2 => '9.0',
      ),
    ),
    'AddressController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AddressFormat' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      '_getformatdb' => 
      array (
        0 => '_getFormatDB',
        1 => false,
        2 => '8.0',
      ),
    ),
    'AddressesController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminAccessController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminCarrierWizardController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
      'displayfieldname' => 
      array (
        0 => 'displayFieldName',
        1 => true,
        2 => '9.0',
      ),
    ),
    'AdminCarriersController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminCartRulesController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminCountriesController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminCustomerThreadsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminDashboardController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
      'displayajaxgetblogrss' => 
      array (
        0 => 'displayAjaxGetBlogRss',
        1 => false,
        2 => '8.0',
      ),
    ),
    'AdminGroupsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminImportController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
      'supplyordersimportone' => 
      array (
        0 => 'supplyOrdersImportOne',
        1 => false,
        2 => '9.0',
      ),
      'supplyordersdetailsimportone' => 
      array (
        0 => 'supplyOrdersDetailsImportOne',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminModulesPositionsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
      'initmain' => 
      array (
        0 => 'initMain',
        1 => false,
        2 => '8.0',
      ),
    ),
    'AdminNotFoundController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminPdfController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
      'generatedeliveryslippdfbyidorder' => 
      array (
        0 => 'generateDeliverySlipPDFByIdOrder',
        1 => false,
        2 => '9.0',
      ),
      'generateinvoicepdfbyidorder' => 
      array (
        0 => 'generateInvoicePDFByIdOrder',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminQuickAccessesController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminReturnController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminSearchConfController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminSearchController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminShopController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminShopGroupController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminShopUrlController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminSpecificPriceRuleController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminStatsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminStatsTabController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminStoresController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminTabsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminTagsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminTaxRulesGroupController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AdminTranslationsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
      'submitexportlang' => 
      array (
        0 => 'submitExportLang',
        1 => false,
        2 => '9.0',
      ),
      'submitimportlang' => 
      array (
        0 => 'submitImportLang',
        1 => false,
        2 => '9.0',
      ),
      'filtertranslationfiles' => 
      array (
        0 => 'filterTranslationFiles',
        1 => true,
        2 => '9.0',
      ),
      'fileslisttopaths' => 
      array (
        0 => 'filesListToPaths',
        1 => true,
        2 => '9.0',
      ),
      'initformfields' => 
      array (
        0 => 'initFormFields',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Alias' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Attachment' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AttachmentController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AttributeGroup' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'AuthController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'BestSalesController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'BoOrder' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
      'formatproductandvoucherforemail' => 
      array (
        0 => 'formatProductAndVoucherForEmail',
        1 => false,
        2 => '8.0',
      ),
    ),
    'CMS' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'geturlrewriteinformations' => 
      array (
        0 => 'getUrlRewriteInformations',
        1 => true,
        2 => '9.0',
      ),
    ),
    'CMSCategory' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'searchbynameandparentcmscategoryid' => 
      array (
        0 => 'searchByNameAndParentCMSCategoryId',
        1 => true,
        2 => '8.0',
      ),
      'geturlrewriteinformations' => 
      array (
        0 => 'getUrlRewriteInformations',
        1 => true,
        2 => '9.0',
      ),
    ),
    'CMSRole' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Carrier' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getcarriernamefromshopname' => 
      array (
        0 => 'getCarrierNameFromShopName',
        1 => true,
        2 => '8.0',
      ),
    ),
    'CarrierModule' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Cart' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'gettaxesaverageused' => 
      array (
        0 => 'getTaxesAverageUsed',
        1 => true,
        2 => '8.0',
      ),
      'containsproduct' => 
      array (
        0 => 'containsProduct',
        1 => false,
        2 => '9.0',
      ),
      '_updatecustomizationquantity' => 
      array (
        0 => '_updateCustomizationQuantity',
        1 => false,
        2 => '9.0',
      ),
      'simulatecarriersoutput' => 
      array (
        0 => 'simulateCarriersOutput',
        1 => false,
        2 => '9.0',
      ),
      'getordershippingcost' => 
      array (
        0 => 'getOrderShippingCost',
        1 => false,
        2 => '8.0',
      ),
      'checkdiscountvalidity' => 
      array (
        0 => 'checkDiscountValidity',
        1 => false,
        2 => '8.0',
      ),
      'deletepicturetoproduct' => 
      array (
        0 => 'deletePictureToProduct',
        1 => false,
        2 => '8.0',
      ),
      'replacezerobyshopname' => 
      array (
        0 => 'replaceZeroByShopName',
        1 => true,
        2 => '8.0',
      ),
      'addextracarriers' => 
      array (
        0 => 'addExtraCarriers',
        1 => true,
        2 => '8.0',
      ),
      'getdeliveryaddresseswithoutcarriers' => 
      array (
        0 => 'getDeliveryAddressesWithoutCarriers',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CartController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CartRule' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'checkproductrestrictions' => 
      array (
        0 => 'checkProductRestrictions',
        1 => false,
        2 => '8.0',
      ),
    ),
    'Category' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      '_subtree' => 
      array (
        0 => '_subTree',
        1 => true,
        2 => '8.0',
      ),
      'geturlrewriteinformations' => 
      array (
        0 => 'getUrlRewriteInformations',
        1 => true,
        2 => '8.0',
      ),
      'geturlrewriteinformation' => 
      array (
        0 => 'getUrlRewriteInformation',
        1 => true,
        2 => '9.0',
      ),
      'getcategoryinformations' => 
      array (
        0 => 'getCategoryInformations',
        1 => true,
        2 => '8.0',
      ),
    ),
    'CategoryController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ChangeCurrencyController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CmsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Combination' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'loadstockdata' => 
      array (
        0 => 'loadStockData',
        1 => false,
        2 => '8.0',
      ),
    ),
    'Configuration' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getint' => 
      array (
        0 => 'getInt',
        1 => true,
        2 => '8.0',
      ),
    ),
    'ConfigurationKPI' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Connection' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ConnectionsSource' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Contact' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ContactController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Controller' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Cookie' => 
    array (
      'islogged' => 
      array (
        0 => 'isLogged',
        1 => false,
        2 => '8.0',
      ),
      'isloggedback' => 
      array (
        0 => 'isLoggedBack',
        1 => false,
        2 => '8.0',
      ),
      '_setcookie' => 
      array (
        0 => '_setcookie',
        1 => false,
        2 => '8.0',
      ),
    ),
    'Country' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Currency' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getconversationrate' => 
      array (
        0 => 'getConversationRate',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Customer' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CustomerAddress' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getfieldsvalidate' => 
      array (
        0 => 'getFieldsValidate',
        1 => true,
        2 => '9.0',
      ),
    ),
    'CustomerMessage' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CustomerSession' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CustomerThread' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Customization' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'CustomizationField' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'DateRange' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'DbPDO' => 
    array (
      '_getpdo' => 
      array (
        0 => '_getPDO',
        1 => true,
        2 => '8.0',
      ),
    ),
    'Delivery' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'DiscountController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'DummyAdminController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Employee' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'EmployeeSession' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Feature' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'FeatureFlag' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'FeatureValue' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'FrontController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Gender' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'GetFileController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Group' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'GroupReduction' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getgroupbycategoryid' => 
      array (
        0 => 'getGroupByCategoryId',
        1 => true,
        2 => '8.0',
      ),
      'getgroupreductionbycategoryid' => 
      array (
        0 => 'getGroupReductionByCategoryId',
        1 => true,
        2 => '8.0',
      ),
    ),
    'Guest' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'GuestTrackingController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Helper' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperCalendar' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperForm' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperImageUploader' => 
    array (
      '_getfilesize' => 
      array (
        0 => '_getFileSize',
        1 => false,
        2 => '8.0',
      ),
      '_getservervars' => 
      array (
        0 => '_getServerVars',
        1 => false,
        2 => '8.0',
      ),
      '_normalizedirectory' => 
      array (
        0 => '_normalizeDirectory',
        1 => false,
        2 => '8.0',
      ),
    ),
    'HelperKpi' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperKpiRow' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperList' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperOptions' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperShop' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HelperUploader' => 
    array (
      '_getfilesize' => 
      array (
        0 => '_getFileSize',
        1 => false,
        2 => '8.0',
      ),
      '_getservervars' => 
      array (
        0 => '_getServerVars',
        1 => false,
        2 => '8.0',
      ),
      '_normalizedirectory' => 
      array (
        0 => '_normalizeDirectory',
        1 => false,
        2 => '8.0',
      ),
    ),
    'HelperView' => 
    array (
      'renderadmincategorietree' => 
      array (
        0 => 'renderAdminCategorieTree',
        1 => true,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'rendershoplist' => 
      array (
        0 => 'renderShopList',
        1 => true,
        2 => '8.0',
      ),
    ),
    'HistoryController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Hook' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'gethookaliaslist' => 
      array (
        0 => 'getHookAliasList',
        1 => true,
        2 => '8.0',
      ),
      'getretrohookname' => 
      array (
        0 => 'getRetroHookName',
        1 => true,
        2 => '8.0',
      ),
    ),
    'IdentityController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Image' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ImageType' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getformatedname' => 
      array (
        0 => 'getFormatedName',
        1 => true,
        2 => '8.0',
      ),
    ),
    'IndexController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Language' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'recursedeletedir' => 
      array (
        0 => 'recurseDeleteDir',
        1 => true,
        2 => '8.0',
      ),
      '_copynoneflag' => 
      array (
        0 => '_copyNoneFlag',
        1 => true,
        2 => '8.0',
      ),
      'installemailslanguagepack' => 
      array (
        0 => 'installEmailsLanguagePack',
        1 => true,
        2 => '8.0',
      ),
      'getlanguagepacklistcontent' => 
      array (
        0 => 'getLanguagePackListContent',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Mail' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Manufacturer' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ManufacturerAddress' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getfieldsvalidate' => 
      array (
        0 => 'getFieldsValidate',
        1 => true,
        2 => '9.0',
      ),
    ),
    'ManufacturerController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Media' => 
    array (
      'packjs' => 
      array (
        0 => 'packJS',
        1 => true,
        2 => '9.0',
      ),
      'minifycss' => 
      array (
        0 => 'minifyCSS',
        1 => true,
        2 => '9.0',
      ),
      'replacebyabsoluteurl' => 
      array (
        0 => 'replaceByAbsoluteURL',
        1 => true,
        2 => '9.0',
      ),
      'getjquerypath' => 
      array (
        0 => 'getJqueryPath',
        1 => true,
        2 => '8.0',
      ),
      'ccccss' => 
      array (
        0 => 'cccCss',
        1 => true,
        2 => '9.0',
      ),
      'getbacktracklimit' => 
      array (
        0 => 'getBackTrackLimit',
        1 => true,
        2 => '9.0',
      ),
      'cccjs' => 
      array (
        0 => 'cccJS',
        1 => true,
        2 => '9.0',
      ),
      'getinlinescript' => 
      array (
        0 => 'getInlineScript',
        1 => true,
        2 => '9.0',
      ),
      'deferinlinescripts' => 
      array (
        0 => 'deferInlineScripts',
        1 => true,
        2 => '9.0',
      ),
      'deferscript' => 
      array (
        0 => 'deferScript',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Message' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Meta' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Module' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'ModuleAdminController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'initmultistoreheader' => 
      array (
        0 => 'initMultistoreHeader',
        1 => false,
        2 => '9.0',
      ),
      'inittabmodulelist' => 
      array (
        0 => 'initTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'addpageheadertoolbarmoduleslistbutton' => 
      array (
        0 => 'addPageHeaderToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'addtoolbarmoduleslistbutton' => 
      array (
        0 => 'addToolBarModulesListButton',
        1 => false,
        2 => '8.0',
      ),
      'filtertabmodulelist' => 
      array (
        0 => 'filterTabModuleList',
        1 => false,
        2 => '8.0',
      ),
      'rendermoduleslist' => 
      array (
        0 => 'renderModulesList',
        1 => false,
        2 => '8.0',
      ),
      'setdeprecatedmedia' => 
      array (
        0 => 'setDeprecatedMedia',
        1 => false,
        2 => '8.0',
      ),
      'l' => 
      array (
        0 => 'l',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '9.0',
      ),
      'isfresh' => 
      array (
        0 => 'isFresh',
        1 => false,
        2 => '9.0',
      ),
      'refresh' => 
      array (
        0 => 'refresh',
        1 => false,
        2 => '9.0',
      ),
      'fillmoduledata' => 
      array (
        0 => 'fillModuleData',
        1 => false,
        2 => '9.0',
      ),
      'displaymoduleoptions' => 
      array (
        0 => 'displayModuleOptions',
        1 => false,
        2 => '9.0',
      ),
      'ajaxprocessgetmodulequickview' => 
      array (
        0 => 'ajaxProcessGetModuleQuickView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ModuleFrontController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ModuleGraph' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'ModuleGraphEngine' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'ModuleGrid' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'ModuleGridEngine' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'MyAccountController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'NewProductsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ObjectModel' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Order' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getdiscounts' => 
      array (
        0 => 'getDiscounts',
        1 => false,
        2 => '9.0',
      ),
      'getordersidinvoicebydate' => 
      array (
        0 => 'getOrdersIdInvoiceByDate',
        1 => true,
        2 => '9.0',
      ),
      'getorderidsbystatus' => 
      array (
        0 => 'getOrderIdsByStatus',
        1 => true,
        2 => '9.0',
      ),
      'getorderbycartid' => 
      array (
        0 => 'getOrderByCartId',
        1 => true,
        2 => '9.0',
      ),
      'adddiscount' => 
      array (
        0 => 'addDiscount',
        1 => false,
        2 => '9.0',
      ),
      'getinvoice' => 
      array (
        0 => 'getInvoice',
        1 => true,
        2 => '9.0',
      ),
      'getwscurrentstate' => 
      array (
        0 => 'getWsCurrentState',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderCarrier' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderCartRule' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderConfirmationController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderDetail' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'checkproductstock' => 
      array (
        0 => 'checkProductStock',
        1 => false,
        2 => '8.0',
      ),
    ),
    'OrderDetailController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderFollowController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderHistory' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getlastorderstate' => 
      array (
        0 => 'getLastOrderState',
        1 => true,
        2 => '8.0',
      ),
    ),
    'OrderInvoice' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderMessage' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderPayment' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getbyorderid' => 
      array (
        0 => 'getByOrderId',
        1 => true,
        2 => '8.0',
      ),
    ),
    'OrderReturn' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderReturnController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderReturnState' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderSlip' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'createorderslip' => 
      array (
        0 => 'createOrderSlip',
        1 => true,
        2 => '8.0',
      ),
    ),
    'OrderSlipController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'OrderState' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Pack' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'addproductattribute' => 
      array (
        0 => 'addProductAttribute',
        1 => false,
        2 => '9.0',
      ),
      'addproductattributemultiple' => 
      array (
        0 => 'addProductAttributeMultiple',
        1 => false,
        2 => '8.0',
      ),
      'updateproductattribute' => 
      array (
        0 => 'updateProductAttribute',
        1 => false,
        2 => '9.0',
      ),
      'updatequantityproductwithattributequantity' => 
      array (
        0 => 'updateQuantityProductWithAttributeQuantity',
        1 => false,
        2 => '9.0',
      ),
      'deleteattributesimpacts' => 
      array (
        0 => 'deleteAttributesImpacts',
        1 => false,
        2 => '8.0',
      ),
      'addattributecombinaison' => 
      array (
        0 => 'addAttributeCombinaison',
        1 => false,
        2 => '8.0',
      ),
      'addattributecombinationmultiple' => 
      array (
        0 => 'addAttributeCombinationMultiple',
        1 => false,
        2 => '8.0',
      ),
      'updatequantity' => 
      array (
        0 => 'updateQuantity',
        1 => true,
        2 => '8.0',
      ),
      'reinjectquantities' => 
      array (
        0 => 'reinjectQuantities',
        1 => true,
        2 => '8.0',
      ),
      'getattributesimpacts' => 
      array (
        0 => 'getAttributesImpacts',
        1 => true,
        2 => '8.0',
      ),
      'addstockmvt' => 
      array (
        0 => 'addStockMvt',
        1 => false,
        2 => '9.0',
      ),
      'getstockmvts' => 
      array (
        0 => 'getStockMvts',
        1 => false,
        2 => '9.0',
      ),
      'geturlrewriteinformations' => 
      array (
        0 => 'getUrlRewriteInformations',
        1 => true,
        2 => '9.0',
      ),
      'getidproductattributesbyidattributes' => 
      array (
        0 => 'getIdProductAttributesByIdAttributes',
        1 => true,
        2 => '8.0',
      ),
      'getattributecombinaisons' => 
      array (
        0 => 'getAttributeCombinaisons',
        1 => false,
        2 => '8.0',
      ),
      'deleteattributecombinaison' => 
      array (
        0 => 'deleteAttributeCombinaison',
        1 => false,
        2 => '8.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Page' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PageNotFoundController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PasswordController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PaymentFree' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
      'formatproductandvoucherforemail' => 
      array (
        0 => 'formatProductAndVoucherForEmail',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PaymentModule' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
      'formatproductandvoucherforemail' => 
      array (
        0 => 'formatProductAndVoucherForEmail',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PdfInvoiceController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PdfOrderReturnController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PdfOrderSlipController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopDatabaseException' => 
    array (
      'getexentedmessage' => 
      array (
        0 => 'getExentedMessage',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopException' => 
    array (
      'getexentedmessage' => 
      array (
        0 => 'getExentedMessage',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopLogger' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      '_ispresent' => 
      array (
        0 => '_isPresent',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopModuleException' => 
    array (
      'getexentedmessage' => 
      array (
        0 => 'getExentedMessage',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopObjectNotFoundException' => 
    array (
      'getexentedmessage' => 
      array (
        0 => 'getExentedMessage',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopPaymentException' => 
    array (
      'getexentedmessage' => 
      array (
        0 => 'getExentedMessage',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PricesDropController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Product' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'addproductattribute' => 
      array (
        0 => 'addProductAttribute',
        1 => false,
        2 => '9.0',
      ),
      'addproductattributemultiple' => 
      array (
        0 => 'addProductAttributeMultiple',
        1 => false,
        2 => '8.0',
      ),
      'updateproductattribute' => 
      array (
        0 => 'updateProductAttribute',
        1 => false,
        2 => '9.0',
      ),
      'updatequantityproductwithattributequantity' => 
      array (
        0 => 'updateQuantityProductWithAttributeQuantity',
        1 => false,
        2 => '9.0',
      ),
      'deleteattributesimpacts' => 
      array (
        0 => 'deleteAttributesImpacts',
        1 => false,
        2 => '8.0',
      ),
      'addattributecombinaison' => 
      array (
        0 => 'addAttributeCombinaison',
        1 => false,
        2 => '8.0',
      ),
      'addattributecombinationmultiple' => 
      array (
        0 => 'addAttributeCombinationMultiple',
        1 => false,
        2 => '8.0',
      ),
      'updatequantity' => 
      array (
        0 => 'updateQuantity',
        1 => true,
        2 => '8.0',
      ),
      'reinjectquantities' => 
      array (
        0 => 'reinjectQuantities',
        1 => true,
        2 => '8.0',
      ),
      'getattributesimpacts' => 
      array (
        0 => 'getAttributesImpacts',
        1 => true,
        2 => '8.0',
      ),
      'addstockmvt' => 
      array (
        0 => 'addStockMvt',
        1 => false,
        2 => '9.0',
      ),
      'getstockmvts' => 
      array (
        0 => 'getStockMvts',
        1 => false,
        2 => '9.0',
      ),
      'geturlrewriteinformations' => 
      array (
        0 => 'getUrlRewriteInformations',
        1 => true,
        2 => '9.0',
      ),
      'getidproductattributesbyidattributes' => 
      array (
        0 => 'getIdProductAttributesByIdAttributes',
        1 => true,
        2 => '8.0',
      ),
      'getattributecombinaisons' => 
      array (
        0 => 'getAttributeCombinaisons',
        1 => false,
        2 => '8.0',
      ),
      'deleteattributecombinaison' => 
      array (
        0 => 'deleteAttributeCombinaison',
        1 => false,
        2 => '8.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => true,
        2 => '9.0',
      ),
    ),
    'ProductAttribute' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ProductController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
      'getminimalproductordeclinationquantity' => 
      array (
        0 => 'getMinimalProductOrDeclinationQuantity',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ProductDownload' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ProductListingFrontController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ProductPresentingFrontController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ProductSupplier' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Profile' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'QuickAccess' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'RangePrice' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'RangeWeight' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'RegistrationController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'RequestSql' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Risk' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SearchController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SearchEngine' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Shop' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'gettheme' => 
      array (
        0 => 'getTheme',
        1 => false,
        2 => '8.0',
      ),
    ),
    'ShopGroup' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'ShopUrl' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SitemapController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SpecificPrice' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'setpriorities' => 
      array (
        0 => 'setPriorities',
        1 => true,
        2 => '9.0',
      ),
    ),
    'SpecificPriceRule' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'State' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'hascounties' => 
      array (
        0 => 'hasCounties',
        1 => true,
        2 => '8.0',
      ),
    ),
    'StatisticsController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Stock' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'StockAvailable' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'setproductdependsonstock' => 
      array (
        0 => 'setProductDependsOnStock',
        1 => true,
        2 => '9.0',
      ),
      'dependsonstock' => 
      array (
        0 => 'dependsOnStock',
        1 => true,
        2 => '9.0',
      ),
    ),
    'StockManagerModule' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'StockMvt' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'addmissingmvt' => 
      array (
        0 => 'addMissingMvt',
        1 => true,
        2 => '8.0',
      ),
    ),
    'StockMvtReason' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'StockMvtWS' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Store' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'StoresController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
      'processstoreaddress' => 
      array (
        0 => 'processStoreAddress',
        1 => false,
        2 => '9.0',
      ),
      'getstoresforxml' => 
      array (
        0 => 'getStoresForXml',
        1 => false,
        2 => '9.0',
      ),
      'displayajax' => 
      array (
        0 => 'displayAjax',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Supplier' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SupplierAddress' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getfieldsvalidate' => 
      array (
        0 => 'getFieldsValidate',
        1 => true,
        2 => '9.0',
      ),
    ),
    'SupplierController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SupplyOrder' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SupplyOrderDetail' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SupplyOrderHistory' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SupplyOrderReceiptHistory' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'SupplyOrderState' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Tab' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'gettabbyidprofile' => 
      array (
        0 => 'getTabByIdProfile',
        1 => true,
        2 => '9.0',
      ),
      'gettabmoduleslist' => 
      array (
        0 => 'getTabModulesList',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Tag' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Tax' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      '_onstatuschange' => 
      array (
        0 => '_onStatusChange',
        1 => false,
        2 => '8.0',
      ),
      'getproducttaxrateviarules' => 
      array (
        0 => 'getProductTaxRateViaRules',
        1 => true,
        2 => '8.0',
      ),
    ),
    'TaxManagerModule' => 
    array (
      'displayflags' => 
      array (
        0 => 'displayFlags',
        1 => false,
        2 => '9.0',
      ),
      'copymodaddonsimg' => 
      array (
        0 => 'copyModAddonsImg',
        1 => true,
        2 => '9.0',
      ),
      'ismoduletrusted' => 
      array (
        0 => 'isModuleTrusted',
        1 => true,
        2 => '8.0',
      ),
      'deletetrustedxmlcache' => 
      array (
        0 => 'deleteTrustedXmlCache',
        1 => true,
        2 => '8.0',
      ),
      'generatetrustedxml' => 
      array (
        0 => 'generateTrustedXml',
        1 => true,
        2 => '8.0',
      ),
      'checkmodulefromaddonsapi' => 
      array (
        0 => 'checkModuleFromAddonsApi',
        1 => true,
        2 => '8.0',
      ),
      'isenabledformobiledevices' => 
      array (
        0 => 'isEnabledForMobileDevices',
        1 => true,
        2 => '9.0',
      ),
    ),
    'TaxRule' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'deletetaxrulebyidcounty' => 
      array (
        0 => 'deleteTaxRuleByIdCounty',
        1 => true,
        2 => '8.0',
      ),
    ),
    'TaxRulesGroup' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'gettaxesrate' => 
      array (
        0 => 'getTaxesRate',
        1 => true,
        2 => '8.0',
      ),
      'gettaxes' => 
      array (
        0 => 'getTaxes',
        1 => true,
        2 => '8.0',
      ),
    ),
    'Tools' => 
    array (
      'getbytes' => 
      array (
        0 => 'getBytes',
        1 => true,
        2 => '9.0',
      ),
      'redirectlink' => 
      array (
        0 => 'redirectLink',
        1 => true,
        2 => '9.0',
      ),
      'getcldr' => 
      array (
        0 => 'getCldr',
        1 => true,
        2 => '8.0',
      ),
      'displayprice' => 
      array (
        0 => 'displayPrice',
        1 => true,
        2 => '9.0',
      ),
      'displaynumber' => 
      array (
        0 => 'displayNumber',
        1 => true,
        2 => '9.0',
      ),
      'array_replace' => 
      array (
        0 => 'array_replace',
        1 => true,
        2 => '8.0',
      ),
      'safepostvars' => 
      array (
        0 => 'safePostVars',
        1 => true,
        2 => '9.0',
      ),
      'encrypt' => 
      array (
        0 => 'encrypt',
        1 => true,
        2 => '9.0',
      ),
      'encryptiv' => 
      array (
        0 => 'encryptIV',
        1 => true,
        2 => '9.0',
      ),
      'link_rewrite' => 
      array (
        0 => 'link_rewrite',
        1 => true,
        2 => '9.0',
      ),
      'stripslashes' => 
      array (
        0 => 'stripslashes',
        1 => true,
        2 => '9.0',
      ),
      'getbrightness' => 
      array (
        0 => 'getBrightness',
        1 => true,
        2 => '9.0',
      ),
      'isbright' => 
      array (
        0 => 'isBright',
        1 => true,
        2 => '9.0',
      ),
      'replacebyabsoluteurl' => 
      array (
        0 => 'replaceByAbsoluteURL',
        1 => true,
        2 => '9.0',
      ),
      'generateindex' => 
      array (
        0 => 'generateIndex',
        1 => true,
        2 => '9.0',
      ),
      'jsondecode' => 
      array (
        0 => 'jsonDecode',
        1 => true,
        2 => '8.0',
      ),
      'jsonencode' => 
      array (
        0 => 'jsonEncode',
        1 => true,
        2 => '8.0',
      ),
      'getsafemodestatus' => 
      array (
        0 => 'getSafeModeStatus',
        1 => true,
        2 => '8.0',
      ),
      'display404error' => 
      array (
        0 => 'display404Error',
        1 => true,
        2 => '8.0',
      ),
      'clearcolorlistcache' => 
      array (
        0 => 'clearColorListCache',
        1 => true,
        2 => '9.0',
      ),
      'cleannonunicodesupport' => 
      array (
        0 => 'cleanNonUnicodeSupport',
        1 => true,
        2 => '9.0',
      ),
      'addonsrequest' => 
      array (
        0 => 'addonsRequest',
        1 => true,
        2 => '8.0',
      ),
      'getdescriptionclean' => 
      array (
        0 => 'getDescriptionClean',
        1 => true,
        2 => '9.0',
      ),
      'arrayreplacerecursive' => 
      array (
        0 => 'arrayReplaceRecursive',
        1 => true,
        2 => '9.0',
      ),
      'getpinnedresolveentry' => 
      array (
        0 => 'getPinnedResolveEntry',
        1 => true,
        2 => '9.0',
      ),
      'hosttoascii' => 
      array (
        0 => 'hostToAscii',
        1 => true,
        2 => '9.0',
      ),
      'hasoutboundproxy' => 
      array (
        0 => 'hasOutboundProxy',
        1 => true,
        2 => '9.0',
      ),
      'isuntrustedurlschemeallowed' => 
      array (
        0 => 'isUntrustedUrlSchemeAllowed',
        1 => true,
        2 => '9.0',
      ),
      'copyfromuntrustedsource' => 
      array (
        0 => 'copyFromUntrustedSource',
        1 => true,
        2 => '9.0',
      ),
      'resolvepublicips' => 
      array (
        0 => 'resolvePublicIps',
        1 => true,
        2 => '9.0',
      ),
      'ispublicip' => 
      array (
        0 => 'isPublicIp',
        1 => true,
        2 => '9.0',
      ),
      'normalizeipforrangecheck' => 
      array (
        0 => 'normalizeIpForRangeCheck',
        1 => true,
        2 => '9.0',
      ),
      'packedipinrange' => 
      array (
        0 => 'packedIpInRange',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Translate' => 
    array (
      'getadmintranslation' => 
      array (
        0 => 'getAdminTranslation',
        1 => true,
        2 => '9.0',
      ),
      'getgenericadmintranslation' => 
      array (
        0 => 'getGenericAdminTranslation',
        1 => true,
        2 => '8.0',
      ),
      'smartypostprocesstranslation' => 
      array (
        0 => 'smartyPostProcessTranslation',
        1 => true,
        2 => '9.0',
      ),
      'pptags' => 
      array (
        0 => 'ppTags',
        1 => true,
        2 => '9.0',
      ),
    ),
    'TranslatedConfiguration' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getint' => 
      array (
        0 => 'getInt',
        1 => true,
        2 => '8.0',
      ),
    ),
    'UploadController' => 
    array (
      'addjquery' => 
      array (
        0 => 'addJquery',
        1 => false,
        2 => '9.0',
      ),
      'ajaxdie' => 
      array (
        0 => 'ajaxDie',
        1 => false,
        2 => '9.0',
      ),
      'addmedia' => 
      array (
        0 => 'addMedia',
        1 => false,
        2 => '8.0',
      ),
      'removemedia' => 
      array (
        0 => 'removeMedia',
        1 => false,
        2 => '8.0',
      ),
      'usemobiletheme' => 
      array (
        0 => 'useMobileTheme',
        1 => false,
        2 => '9.0',
      ),
      'addcolorstoproductlist' => 
      array (
        0 => 'addColorsToProductList',
        1 => false,
        2 => '9.0',
      ),
      'getcolorslistcacheid' => 
      array (
        0 => 'getColorsListCacheId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Uploader' => 
    array (
      '_getfilesize' => 
      array (
        0 => '_getFileSize',
        1 => false,
        2 => '8.0',
      ),
      '_getservervars' => 
      array (
        0 => '_getServerVars',
        1 => false,
        2 => '8.0',
      ),
      '_normalizedirectory' => 
      array (
        0 => '_normalizeDirectory',
        1 => false,
        2 => '8.0',
      ),
    ),
    'Validate' => 
    array (
      'isanything' => 
      array (
        0 => 'isAnything',
        1 => true,
        2 => '9.0',
      ),
      'ispasswd' => 
      array (
        0 => 'isPasswd',
        1 => true,
        2 => '8.0',
      ),
      'isplaintextpassword' => 
      array (
        0 => 'isPlaintextPassword',
        1 => true,
        2 => '9.0',
      ),
      'ispasswdadmin' => 
      array (
        0 => 'isPasswdAdmin',
        1 => true,
        2 => '9.0',
      ),
    ),
    'Warehouse' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'WarehouseAddress' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
      'getfieldsvalidate' => 
      array (
        0 => 'getFieldsValidate',
        1 => true,
        2 => '9.0',
      ),
    ),
    'WarehouseProductLocation' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'WebserviceKey' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
    'Zone' => 
    array (
      'getvalidationrules' => 
      array (
        0 => 'getValidationRules',
        1 => true,
        2 => '9.0',
      ),
      'gettranslationsfields' => 
      array (
        0 => 'getTranslationsFields',
        1 => false,
        2 => '9.0',
      ),
      'maketranslationfields' => 
      array (
        0 => 'makeTranslationFields',
        1 => false,
        2 => '9.0',
      ),
      'setdefinitionretrocompatibility' => 
      array (
        0 => 'setDefinitionRetrocompatibility',
        1 => false,
        2 => '9.0',
      ),
    ),
  ),
  'namespacedMethods' => 
  array (
    'PrestaShopBundle\\Controller\\Admin\\CommonController' => 
    array (
      'recommendedmodulesaction' => 
      array (
        0 => 'recommendedModulesAction',
        1 => false,
        2 => '8.0',
      ),
      'renderfieldaction' => 
      array (
        0 => 'renderFieldAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\EmailController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\SqlManagerController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\AdvancedParameters\\WebserviceController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\ContactsController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Configure\\ShopParameters\\MetaController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\FrameworkBundleAdminController' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
      'overviewaction' => 
      array (
        0 => 'overviewAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\CurrencyController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\LanguageController' => 
    array (
      'searchgridaction' => 
      array (
        0 => 'searchGridAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\International\\TaxController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Improve\\ModuleController' => 
    array (
      'catalogaction' => 
      array (
        0 => 'catalogAction',
        1 => false,
        2 => '8.0',
      ),
      'getpreferredmodulesaction' => 
      array (
        0 => 'getPreferredModulesAction',
        1 => false,
        2 => '8.0',
      ),
      'getmodulecartaction' => 
      array (
        0 => 'getModuleCartAction',
        1 => false,
        2 => '8.0',
      ),
      'refreshcatalogaction' => 
      array (
        0 => 'refreshCatalogAction',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\CategoryController' => 
    array (
      'searchgridaction' => 
      array (
        0 => 'searchGridAction',
        1 => false,
        2 => '9.0',
      ),
      'deletemenuthumbnailaction' => 
      array (
        0 => 'deleteMenuThumbnailAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\FeatureController' => 
    array (
      'getcontrollerconfiguration' => 
      array (
        0 => 'getControllerConfiguration',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\Product\\CombinationController' => 
    array (
      'getlistidsaction' => 
      array (
        0 => 'getListIdsAction',
        1 => false,
        2 => '8.0',
      ),
      'removeaction' => 
      array (
        0 => 'removeAction',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\Product\\ImageController' => 
    array (
      'getimagesaction' => 
      array (
        0 => 'getImagesAction',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Catalog\\Product\\ProductController' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\CustomerService\\CustomerThreadController' => 
    array (
      'updatestatusaction' => 
      array (
        0 => 'updateStatusAction',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Customer\\CustomerController' => 
    array (
      'searchgridaction' => 
      array (
        0 => 'searchGridAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Controller\\Admin\\Sell\\Order\\CreditSlipController' => 
    array (
      'searchaction' => 
      array (
        0 => 'searchAction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\DataCollector\\HookDataCollector' => 
    array (
      'unserialize' => 
      array (
        0 => 'unserialize',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\AttributeGroupLang' => 
    array (
      'getid' => 
      array (
        0 => 'getId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\AttributeLang' => 
    array (
      'getid' => 
      array (
        0 => 'getId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\ProductDownload' => 
    array (
      'setid' => 
      array (
        0 => 'setId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\Repository\\AttributeGroupRepository' => 
    array (
      'listorderedattributegroups' => 
      array (
        0 => 'listOrderedAttributeGroups',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\Repository\\LogRepository' => 
    array (
      'getsearchquerybuilder' => 
      array (
        0 => 'getSearchQueryBuilder',
        1 => false,
        2 => '9.0',
      ),
      'getcountquerybuilder' => 
      array (
        0 => 'getCountQueryBuilder',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\Repository\\RequestSqlRepository' => 
    array (
      'getsearchquerybuilder' => 
      array (
        0 => 'getSearchQueryBuilder',
        1 => false,
        2 => '9.0',
      ),
      'getcountquerybuilder' => 
      array (
        0 => 'getCountQueryBuilder',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\Tab' => 
    array (
      'gethidehostmode' => 
      array (
        0 => 'getHideHostMode',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Entity\\TabLang' => 
    array (
      'getid' => 
      array (
        0 => 'getId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Administration\\GeneralType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Employee\\EmployeeType' => 
    array (
      'buildview' => 
      array (
        0 => 'buildView',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\General\\PreferencesType' => 
    array (
      'setissecure' => 
      array (
        0 => 'setIsSecure',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Currencies\\CurrencyExchangeRateType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Currencies\\CurrencyFormDataProvider' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Catalog\\FeatureType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Combination\\CombinationListType' => 
    array (
      'buildform' => 
      array (
        0 => 'buildForm',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Combination\\CombinationStockType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Details\\FeatureValueType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Options\\OptionsType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Stock\\StockOptionsType' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Sell\\Product\\Stock\\VirtualProductFileType' => 
    array (
      'getsubscribedevents' => 
      array (
        0 => 'getSubscribedEvents',
        1 => true,
        2 => '8.0',
      ),
      'adaptself' => 
      array (
        0 => 'adaptSelf',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\ChangePasswordType' => 
    array (
      'configureoptions' => 
      array (
        0 => 'configureOptions',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\CustomMoneyType' => 
    array (
      'getextendedtype' => 
      array (
        0 => 'getExtendedType',
        1 => false,
        2 => '8.0',
      ),
      'configureoptions' => 
      array (
        0 => 'configureOptions',
        1 => false,
        2 => '9.0',
      ),
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
      'getextendedtypes' => 
      array (
        0 => 'getExtendedTypes',
        1 => true,
        2 => '9.0',
      ),
      'buildform' => 
      array (
        0 => 'buildForm',
        1 => false,
        2 => '9.0',
      ),
      'buildview' => 
      array (
        0 => 'buildView',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Admin\\Type\\ResizableTextType' => 
    array (
      'getextendedtype' => 
      array (
        0 => 'getExtendedType',
        1 => false,
        2 => '8.0',
      ),
      'configureoptions' => 
      array (
        0 => 'configureOptions',
        1 => false,
        2 => '9.0',
      ),
      'buildview' => 
      array (
        0 => 'buildView',
        1 => false,
        2 => '9.0',
      ),
      'getextendedtypes' => 
      array (
        0 => 'getExtendedTypes',
        1 => true,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Form\\Extension\\DataListExtension' => 
    array (
      'getextendedtype' => 
      array (
        0 => 'getExtendedType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Install\\Install' => 
    array (
      'updateschema' => 
      array (
        0 => 'updateSchema',
        1 => false,
        2 => '9.0',
      ),
      'getmoduleslist' => 
      array (
        0 => 'getModulesList',
        1 => false,
        2 => '8.0',
      ),
      'getaddonsmoduleslist' => 
      array (
        0 => 'getAddonsModulesList',
        1 => false,
        2 => '8.0',
      ),
      'installmodulesaddons' => 
      array (
        0 => 'installModulesAddons',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Routing\\Linter\\NamingConventionLinter' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Security\\Admin\\EmployeeProvider' => 
    array (
      'loaduserbyusername' => 
      array (
        0 => 'loadUserByUsername',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Security\\Annotation\\AdminSecurity' => 
    array (
      'getdomain' => 
      array (
        0 => 'getDomain',
        1 => false,
        2 => '9.0',
      ),
      'setdomain' => 
      array (
        0 => 'setDomain',
        1 => false,
        2 => '9.0',
      ),
      'getredirectroute' => 
      array (
        0 => 'getRedirectRoute',
        1 => false,
        2 => '9.0',
      ),
      'setredirectroute' => 
      array (
        0 => 'setRedirectRoute',
        1 => false,
        2 => '9.0',
      ),
      'geturl' => 
      array (
        0 => 'getUrl',
        1 => false,
        2 => '9.0',
      ),
      'seturl' => 
      array (
        0 => 'setUrl',
        1 => false,
        2 => '9.0',
      ),
      'getredirectqueryparamstokeep' => 
      array (
        0 => 'getRedirectQueryParamsToKeep',
        1 => false,
        2 => '9.0',
      ),
      'setredirectqueryparamstokeep' => 
      array (
        0 => 'setRedirectQueryParamsToKeep',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Security\\Role\\DynamicRoleHierarchy' => 
    array (
      'getreachableroles' => 
      array (
        0 => 'getReachableRoles',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Service\\DataProvider\\UserProvider' => 
    array (
      'getusername' => 
      array (
        0 => 'getUsername',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Service\\Routing\\Router' => 
    array (
      'settokenmanager' => 
      array (
        0 => 'setTokenManager',
        1 => false,
        2 => '9.0',
      ),
      'setuserprovider' => 
      array (
        0 => 'setUserProvider',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShopBundle\\Translation\\Provider\\AbstractProvider' => 
    array (
      'getprestashoplocale' => 
      array (
        0 => 'getPrestaShopLocale',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Translation\\Provider\\SearchProvider' => 
    array (
      'getdomain' => 
      array (
        0 => 'getDomain',
        1 => false,
        2 => '8.0',
      ),
      'getmoduledirectory' => 
      array (
        0 => 'getModuleDirectory',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Translation\\Provider\\ThemeProvider' => 
    array (
      'getdomain' => 
      array (
        0 => 'getDomain',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Twig\\HookExtension' => 
    array (
      'hookcount' => 
      array (
        0 => 'hookCount',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShopBundle\\Twig\\LayoutExtension' => 
    array (
      'getlegacylayout' => 
      array (
        0 => 'getLegacyLayout',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Attribute\\Repository\\AttributeRepository' => 
    array (
      'getproductattributesids' => 
      array (
        0 => 'getProductAttributesIds',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Carrier\\CarrierOptionsConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Carrier\\HandlingConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Customer\\CustomerConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Employee\\EmployeeFormAccessChecker' => 
    array (
      'canaccessaddonsconnect' => 
      array (
        0 => 'canAccessAddonsConnect',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Hosting\\HostingInformation' => 
    array (
      'ishostmode' => 
      array (
        0 => 'isHostMode',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Invoice\\InvoiceOptionsConfiguration' => 
    array (
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\LegacyContext' => 
    array (
      'getlegacylayout' => 
      array (
        0 => 'getLegacyLayout',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Meta\\SEOOptionsDataConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Meta\\SetUpUrlsDataConfiguration' => 
    array (
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Meta\\UrlSchemaDataConfiguration' => 
    array (
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\AdminModuleDataProvider' => 
    array (
      'clearcatalogcache' => 
      array (
        0 => 'clearCatalogCache',
        1 => false,
        2 => '8.0',
      ),
      'clearmodulelistcache' => 
      array (
        0 => 'clearModuleListCache',
        1 => false,
        2 => '8.0',
      ),
      'getcatalogmodules' => 
      array (
        0 => 'getCatalogModules',
        1 => false,
        2 => '8.0',
      ),
      'getcatalogmodulesnames' => 
      array (
        0 => 'getCatalogModulesNames',
        1 => false,
        2 => '8.0',
      ),
      'generateaddonsurls' => 
      array (
        0 => 'generateAddonsUrls',
        1 => false,
        2 => '8.0',
      ),
      'getmoduleattributesbyid' => 
      array (
        0 => 'getModuleAttributesById',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\Module' => 
    array (
      'onmobileenable' => 
      array (
        0 => 'onMobileEnable',
        1 => false,
        2 => '9.0',
      ),
      'onmobiledisable' => 
      array (
        0 => 'onMobileDisable',
        1 => false,
        2 => '9.0',
      ),
      'canbeupgradedfromaddons' => 
      array (
        0 => 'canBeUpgradedFromAddons',
        1 => false,
        2 => '8.0',
      ),
      'isactiveonmobile' => 
      array (
        0 => 'isActiveOnMobile',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Module\\ModuleDataUpdater' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'setmoduleondiskfromaddons' => 
      array (
        0 => 'setModuleOnDiskFromAddons',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Order\\Delivery\\SlipPdfConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Order\\GeneralConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Order\\GiftOptionsConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Order\\Refund\\OrderProductRemover' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\Repository\\CombinationRepository' => 
    array (
      'getcombinationidsbyproductid' => 
      array (
        0 => 'getCombinationIdsByProductId',
        1 => false,
        2 => '8.0',
      ),
      'finddefaultcombination' => 
      array (
        0 => 'findDefaultCombination',
        1 => false,
        2 => '8.0',
      ),
      'getcombinationidsbyattributes' => 
      array (
        0 => 'getCombinationIdsByAttributes',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Combination\\Update\\CombinationStockProperties' => 
    array (
      'getquantity' => 
      array (
        0 => 'getQuantity',
        1 => false,
        2 => '8.0',
      ),
      'getminimalquantity' => 
      array (
        0 => 'getMinimalQuantity',
        1 => false,
        2 => '8.0',
      ),
      'getlowstockthreshold' => 
      array (
        0 => 'getLowStockThreshold',
        1 => false,
        2 => '8.0',
      ),
      'islowstockalertenabled' => 
      array (
        0 => 'isLowStockAlertEnabled',
        1 => false,
        2 => '8.0',
      ),
      'getavailabledate' => 
      array (
        0 => 'getAvailableDate',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Image\\Repository\\ProductImageRepository' => 
    array (
      'getimagesids' => 
      array (
        0 => 'getImagesIds',
        1 => false,
        2 => '8.0',
      ),
      'findcover' => 
      array (
        0 => 'findCover',
        1 => false,
        2 => '8.0',
      ),
      'getimagesidsforcombinations' => 
      array (
        0 => 'getImagesIdsForCombinations',
        1 => false,
        2 => '8.0',
      ),
      'partialupdate' => 
      array (
        0 => 'partialUpdate',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Repository\\ProductRepository' => 
    array (
      'duplicate' => 
      array (
        0 => 'duplicate',
        1 => false,
        2 => '8.0',
      ),
      'getpricebyshop' => 
      array (
        0 => 'getPriceByShop',
        1 => false,
        2 => '8.0',
      ),
      'delete' => 
      array (
        0 => 'delete',
        1 => false,
        2 => '8.0',
      ),
      'bulkdelete' => 
      array (
        0 => 'bulkDelete',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Repository\\ProductSupplierRepository' => 
    array (
      'getproductdefaultsupplierid' => 
      array (
        0 => 'getProductDefaultSupplierId',
        1 => false,
        2 => '8.0',
      ),
      'getassociatedproductsuppliers' => 
      array (
        0 => 'getAssociatedProductSuppliers',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\SpecificPrice\\Repository\\SpecificPriceRepository' => 
    array (
      'getproductspecificpricescount' => 
      array (
        0 => 'getProductSpecificPricesCount',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\SpecificPrice\\Update\\SpecificPricePriorityUpdater' => 
    array (
      'setglobalpriorities' => 
      array (
        0 => 'setGlobalPriorities',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Stock\\Repository\\StockAvailableRepository' => 
    array (
      'create' => 
      array (
        0 => 'create',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Product\\Update\\ProductSupplierUpdater' => 
    array (
      'setproductsuppliers' => 
      array (
        0 => 'setProductSuppliers',
        1 => false,
        2 => '8.0',
      ),
      'setcombinationsuppliers' => 
      array (
        0 => 'setCombinationSuppliers',
        1 => false,
        2 => '8.0',
      ),
      'removeallforcombination' => 
      array (
        0 => 'removeAllForCombination',
        1 => false,
        2 => '8.0',
      ),
      'resetdefaultsupplier' => 
      array (
        0 => 'resetDefaultSupplier',
        1 => false,
        2 => '8.0',
      ),
      'updatecombinationdefaultsupplier' => 
      array (
        0 => 'updateCombinationDefaultSupplier',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Shop\\Context' => 
    array (
      'isshopgroupcontext' => 
      array (
        0 => 'isShopGroupContext',
        1 => false,
        2 => '9.0',
      ),
      'isallcontext' => 
      array (
        0 => 'isAllContext',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Shop\\MaintenanceConfiguration' => 
    array (
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\TaxRulesGroup\\Repository\\TaxRulesGroupRepository' => 
    array (
      'gettaxrulesgroupdetails' => 
      array (
        0 => 'getTaxRulesGroupDetails',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Tools' => 
    array (
      'link_rewrite' => 
      array (
        0 => 'link_rewrite',
        1 => false,
        2 => '8.0',
      ),
      'bcadd' => 
      array (
        0 => 'bcadd',
        1 => false,
        2 => '8.0',
      ),
      'cleannonunicodesupport' => 
      array (
        0 => 'cleanNonUnicodeSupport',
        1 => false,
        2 => '9.0',
      ),
      'copyfromuntrustedsource' => 
      array (
        0 => 'copyFromUntrustedSource',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Adapter\\Webservice\\WebserviceConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\ConstraintValidator\\CustomerNameValidator' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\ConstraintValidator\\Factory\\CustomerNameValidatorFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Attachment\\QueryResult\\AttachmentInformation' => 
    array (
      'getname' => 
      array (
        0 => 'getName',
        1 => false,
        2 => '8.0',
      ),
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\AttributeGroup\\ValueObject\\AttributeGroupId' => 
    array (
      'getattributegroupid' => 
      array (
        0 => 'getAttributeGroupId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\Command\\AddCartRuleCommand' => 
    array (
      'getdiscountapplicationtype' => 
      array (
        0 => 'getDiscountApplicationType',
        1 => false,
        2 => '9.0',
      ),
      'setdiscountapplicationtype' => 
      array (
        0 => 'setDiscountApplicationType',
        1 => false,
        2 => '9.0',
      ),
      'getdiscountproductid' => 
      array (
        0 => 'getDiscountProductId',
        1 => false,
        2 => '9.0',
      ),
      'setdiscountproductid' => 
      array (
        0 => 'setDiscountProductId',
        1 => false,
        2 => '9.0',
      ),
      'getminimumamountcondition' => 
      array (
        0 => 'getMinimumAmountCondition',
        1 => false,
        2 => '9.0',
      ),
      'hascountryrestriction' => 
      array (
        0 => 'hasCountryRestriction',
        1 => false,
        2 => '9.0',
      ),
      'hascarrierrestriction' => 
      array (
        0 => 'hasCarrierRestriction',
        1 => false,
        2 => '9.0',
      ),
      'hasgrouprestriction' => 
      array (
        0 => 'hasGroupRestriction',
        1 => false,
        2 => '9.0',
      ),
      'hascartrulerestriction' => 
      array (
        0 => 'hasCartRuleRestriction',
        1 => false,
        2 => '9.0',
      ),
      'hasproductrestriction' => 
      array (
        0 => 'hasProductRestriction',
        1 => false,
        2 => '9.0',
      ),
      'hasshoprestriction' => 
      array (
        0 => 'hasShopRestriction',
        1 => false,
        2 => '9.0',
      ),
      'isallowpartialuse' => 
      array (
        0 => 'isAllowPartialUse',
        1 => false,
        2 => '9.0',
      ),
      'sethascountryrestriction' => 
      array (
        0 => 'setHasCountryRestriction',
        1 => false,
        2 => '9.0',
      ),
      'sethascarrierrestriction' => 
      array (
        0 => 'setHasCarrierRestriction',
        1 => false,
        2 => '9.0',
      ),
      'sethasgrouprestriction' => 
      array (
        0 => 'setHasGroupRestriction',
        1 => false,
        2 => '9.0',
      ),
      'sethascartrulerestriction' => 
      array (
        0 => 'setHasCartRuleRestriction',
        1 => false,
        2 => '9.0',
      ),
      'sethasproductrestriction' => 
      array (
        0 => 'setHasProductRestriction',
        1 => false,
        2 => '9.0',
      ),
      'sethasshoprestriction' => 
      array (
        0 => 'setHasShopRestriction',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\Query\\GetCartRuleForEditing' => 
    array (
      'getcartruleid' => 
      array (
        0 => 'getCartRuleId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\DiscountApplicationType' => 
    array (
      'getvalue' => 
      array (
        0 => 'getValue',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\GiftProduct' => 
    array (
      'getproductattributeid' => 
      array (
        0 => 'getProductAttributeId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CartRule\\ValueObject\\PercentageDiscount' => 
    array (
      'appliestodiscountedproducts' => 
      array (
        0 => 'appliesToDiscountedProducts',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\Command\\AddCategoryCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeywords' => 
      array (
        0 => 'setLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\Command\\AddRootCategoryCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeywords' => 
      array (
        0 => 'setLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\Command\\EditCategoryCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeywords' => 
      array (
        0 => 'setLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\Command\\EditRootCategoryCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeywords' => 
      array (
        0 => 'setLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\QueryResult\\CategoryForTree' => 
    array (
      'getlocalizednames' => 
      array (
        0 => 'getLocalizedNames',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Category\\QueryResult\\EditableCategory' => 
    array (
      'getmetakeywords' => 
      array (
        0 => 'getMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'getmenuthumbnailimages' => 
      array (
        0 => 'getMenuThumbnailImages',
        1 => false,
        2 => '9.0',
      ),
      'cancontainmoremenuthumbnails' => 
      array (
        0 => 'canContainMoreMenuThumbnails',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CmsPageCategory\\Command\\AddCmsPageCategoryCommand' => 
    array (
      'getlocalisedmetakeywords' => 
      array (
        0 => 'getLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalisedmetakeywords' => 
      array (
        0 => 'setLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CmsPageCategory\\Command\\EditCmsPageCategoryCommand' => 
    array (
      'getlocalisedmetakeywords' => 
      array (
        0 => 'getLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalisedmetakeywords' => 
      array (
        0 => 'setLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CmsPageCategory\\QueryResult\\EditableCmsPageCategory' => 
    array (
      'getlocalisedmetakeywords' => 
      array (
        0 => 'getLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CmsPage\\Command\\AddCmsPageCommand' => 
    array (
      'getlocalizedmetakeyword' => 
      array (
        0 => 'getLocalizedMetaKeyword',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CmsPage\\Command\\EditCmsPageCommand' => 
    array (
      'getlocalizedmetakeyword' => 
      array (
        0 => 'getLocalizedMetaKeyword',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeyword' => 
      array (
        0 => 'setLocalizedMetaKeyword',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\CmsPage\\QueryResult\\EditableCmsPage' => 
    array (
      'getlocalizedmetakeyword' => 
      array (
        0 => 'getLocalizedMetaKeyword',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Currency\\Command\\AddCurrencyCommand' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
      'getisocode' => 
      array (
        0 => 'getIsoCode',
        1 => false,
        2 => '9.0',
      ),
      'getprecision' => 
      array (
        0 => 'getPrecision',
        1 => false,
        2 => '9.0',
      ),
      'setprecision' => 
      array (
        0 => 'setPrecision',
        1 => false,
        2 => '9.0',
      ),
      'getexchangerate' => 
      array (
        0 => 'getExchangeRate',
        1 => false,
        2 => '9.0',
      ),
      'getlocalizednames' => 
      array (
        0 => 'getLocalizedNames',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizednames' => 
      array (
        0 => 'setLocalizedNames',
        1 => false,
        2 => '9.0',
      ),
      'getlocalizedsymbols' => 
      array (
        0 => 'getLocalizedSymbols',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedsymbols' => 
      array (
        0 => 'setLocalizedSymbols',
        1 => false,
        2 => '9.0',
      ),
      'isenabled' => 
      array (
        0 => 'isEnabled',
        1 => false,
        2 => '9.0',
      ),
      'getshopids' => 
      array (
        0 => 'getShopIds',
        1 => false,
        2 => '9.0',
      ),
      'setshopids' => 
      array (
        0 => 'setShopIds',
        1 => false,
        2 => '9.0',
      ),
      'getlocalizedtransformations' => 
      array (
        0 => 'getLocalizedTransformations',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedtransformations' => 
      array (
        0 => 'setLocalizedTransformations',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Currency\\Command\\EditCurrencyCommand' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
      'getcurrencyid' => 
      array (
        0 => 'getCurrencyId',
        1 => false,
        2 => '9.0',
      ),
      'getexchangerate' => 
      array (
        0 => 'getExchangeRate',
        1 => false,
        2 => '9.0',
      ),
      'setexchangerate' => 
      array (
        0 => 'setExchangeRate',
        1 => false,
        2 => '9.0',
      ),
      'getprecision' => 
      array (
        0 => 'getPrecision',
        1 => false,
        2 => '9.0',
      ),
      'setprecision' => 
      array (
        0 => 'setPrecision',
        1 => false,
        2 => '9.0',
      ),
      'getlocalizednames' => 
      array (
        0 => 'getLocalizedNames',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizednames' => 
      array (
        0 => 'setLocalizedNames',
        1 => false,
        2 => '9.0',
      ),
      'getlocalizedsymbols' => 
      array (
        0 => 'getLocalizedSymbols',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedsymbols' => 
      array (
        0 => 'setLocalizedSymbols',
        1 => false,
        2 => '9.0',
      ),
      'isenabled' => 
      array (
        0 => 'isEnabled',
        1 => false,
        2 => '9.0',
      ),
      'setisenabled' => 
      array (
        0 => 'setIsEnabled',
        1 => false,
        2 => '9.0',
      ),
      'getshopids' => 
      array (
        0 => 'getShopIds',
        1 => false,
        2 => '9.0',
      ),
      'setshopids' => 
      array (
        0 => 'setShopIds',
        1 => false,
        2 => '9.0',
      ),
      'getlocalizedtransformations' => 
      array (
        0 => 'getLocalizedTransformations',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedtransformations' => 
      array (
        0 => 'setLocalizedTransformations',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Customer\\Exception\\CustomerNotFoundException' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'getcustomerid' => 
      array (
        0 => 'getCustomerId',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Customer\\QueryResult\\ViewableCustomer' => 
    array (
      'getreferrersinformation' => 
      array (
        0 => 'getReferrersInformation',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Feature\\Command\\AddFeatureCommand' => 
    array (
      'getshopassociation' => 
      array (
        0 => 'getShopAssociation',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Hook\\Command\\UpdateHookStatusCommand' => 
    array (
      'getstatus' => 
      array (
        0 => 'getStatus',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Hook\\Query\\GetHookStatus' => 
    array (
      'gethookid' => 
      array (
        0 => 'getHookId',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Manufacturer\\Command\\AddManufacturerCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Manufacturer\\Command\\EditManufacturerCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeywords' => 
      array (
        0 => 'setLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Manufacturer\\QueryResult\\EditableManufacturer' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Meta\\Command\\AddMetaCommand' => 
    array (
      'getlocalisedmetakeywords' => 
      array (
        0 => 'getLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalisedmetakeywords' => 
      array (
        0 => 'setLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Meta\\Command\\EditMetaCommand' => 
    array (
      'setlocalisedmetakeywords' => 
      array (
        0 => 'setLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'getlocalisedmetakeywords' => 
      array (
        0 => 'getLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Meta\\QueryResult\\EditableMeta' => 
    array (
      'getlocalisedmetakeywords' => 
      array (
        0 => 'getLocalisedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Order\\QueryResult\\OrderReturnForViewing' => 
    array (
      'getcarrierid' => 
      array (
        0 => 'getCarrierId',
        1 => false,
        2 => '8.0',
      ),
      'gettrackingurl' => 
      array (
        0 => 'getTrackingUrl',
        1 => false,
        2 => '8.0',
      ),
      'gettrackingnumber' => 
      array (
        0 => 'getTrackingNumber',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\AttributeGroup\\Query\\GetProductAttributeGroups' => 
    array (
      'withattributes' => 
      array (
        0 => 'withAttributes',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Combination\\Exception\\CannotBulkDeleteCombinationException' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'getcombinationids' => 
      array (
        0 => 'getCombinationIds',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Exception\\CannotBulkDeleteProductException' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'getproductids' => 
      array (
        0 => 'getProductIds',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\QueryResult\\ProductForEditing' => 
    array (
      'getassociatedattachmentids' => 
      array (
        0 => 'getAssociatedAttachmentIds',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\QueryResult\\ProductOptions' => 
    array (
      'isactive' => 
      array (
        0 => 'isActive',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\QueryResult\\ProductStockInformation' => 
    array (
      'useadvancedstockmanagement' => 
      array (
        0 => 'useAdvancedStockManagement',
        1 => false,
        2 => '8.0',
      ),
      'dependsonstock' => 
      array (
        0 => 'dependsOnStock',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\SpecificPrice\\QueryResult\\SpecificPriceForEditing' => 
    array (
      'getprice' => 
      array (
        0 => 'getPrice',
        1 => false,
        2 => '8.0',
      ),
      'getshopgroupid' => 
      array (
        0 => 'getShopGroupId',
        1 => false,
        2 => '8.0',
      ),
      'getcustomerid' => 
      array (
        0 => 'getCustomerId',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Product\\Supplier\\QueryResult\\ProductSupplierOptions' => 
    array (
      'getsuppliersinfo' => 
      array (
        0 => 'getSuppliersInfo',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Supplier\\Command\\AddSupplierCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Supplier\\Command\\EditSupplierCommand' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
      'setlocalizedmetakeywords' => 
      array (
        0 => 'setLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Domain\\Supplier\\QueryResult\\EditableSupplier' => 
    array (
      'getlocalizedmetakeywords' => 
      array (
        0 => 'getLocalizedMetaKeywords',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Employee\\Access\\EmployeeFormAccessCheckerInterface' => 
    array (
      'canaccessaddonsconnect' => 
      array (
        0 => 'canAccessAddonsConnect',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Foundation\\Version' => 
    array (
      'getreleaseversion' => 
      array (
        0 => 'getReleaseVersion',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\BooleanColumn' => 
    array (
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\ColorColumn' => 
    array (
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\DataColumn' => 
    array (
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\DisableableLinkColumn' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
      'setoptions' => 
      array (
        0 => 'setOptions',
        1 => false,
        2 => '8.0',
      ),
      'getoptions' => 
      array (
        0 => 'getOptions',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\LinkGroupColumn' => 
    array (
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\OrderPriceColumn' => 
    array (
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Column\\Type\\PreviewColumn' => 
    array (
      'gettype' => 
      array (
        0 => 'getType',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Data\\Factory\\CategoryDataFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'getdata' => 
      array (
        0 => 'getData',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Data\\Factory\\CustomerDiscountGridDataFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Data\\Factory\\EmptyCategoryGridDataFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'getdata' => 
      array (
        0 => 'getData',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Definition\\Factory\\AbstractGridDefinitionFactory' => 
    array (
      'sethookdispatcher' => 
      array (
        0 => 'setHookDispatcher',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Definition\\Factory\\ContactGridDefinitionFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Definition\\Factory\\EmployeeGridDefinitionFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Definition\\Factory\\ProfileGridDefinitionFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Definition\\Factory\\WebserviceKeyDefinitionFactory' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Grid\\Presenter\\GridPresenter' => 
    array (
      'getorderingposition' => 
      array (
        0 => 'getOrderingPosition',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Image\\Parser\\ImageTagSourceParser' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Localization\\RTL\\Processor' => 
    array (
      'setisinstall' => 
      array (
        0 => 'setIsInstall',
        1 => false,
        2 => '8.0',
      ),
      'setregenerate' => 
      array (
        0 => 'setRegenerate',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\MerchandiseReturn\\Configuration\\MerchandiseReturnOptionsConfiguration' => 
    array (
      '__construct' => 
      array (
        0 => '__construct',
        1 => false,
        2 => '8.0',
      ),
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Module\\EventSubscriber' => 
    array (
      'onmoduleinstalledoruninstalled' => 
      array (
        0 => 'onModuleInstalledOrUninstalled',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Module\\ModuleInterface' => 
    array (
      'onmobileenable' => 
      array (
        0 => 'onMobileEnable',
        1 => false,
        2 => '9.0',
      ),
      'onmobiledisable' => 
      array (
        0 => 'onMobileDisable',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Module\\ModuleManager' => 
    array (
      'enablemobile' => 
      array (
        0 => 'enableMobile',
        1 => false,
        2 => '9.0',
      ),
      'disablemobile' => 
      array (
        0 => 'disableMobile',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Module\\ModuleManagerInterface' => 
    array (
      'enablemobile' => 
      array (
        0 => 'enableMobile',
        1 => false,
        2 => '9.0',
      ),
      'disablemobile' => 
      array (
        0 => 'disableMobile',
        1 => false,
        2 => '9.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Tax\\TaxOptionsConfiguration' => 
    array (
      'validateconfiguration' => 
      array (
        0 => 'validateConfiguration',
        1 => false,
        2 => '8.0',
      ),
    ),
    'PrestaShop\\PrestaShop\\Core\\Util\\DateTime\\NullDateTime' => 
    array (
      '__wakeup' => 
      array (
        0 => '__wakeup',
        1 => false,
        2 => '8.0',
      ),
    ),
  ),
  'consts' => 
  array (
    'AbstractLogger' => 
    array (
      'DEBUG' => '8.0',
      'INFO' => '8.0',
      'WARNING' => '8.0',
      'ERROR' => '8.0',
    ),
    'Cart' => 
    array (
      'ONLY_PRODUCTS_WITHOUT_SHIPPING' => '9.0',
    ),
    'Module' => 
    array (
      'CACHE_FILE_MODULES_LIST' => '9.0',
      'CACHE_FILE_TAB_MODULES_LIST' => '9.0',
      'CACHE_FILE_ALL_COUNTRY_MODULES_LIST' => '9.0',
      'CACHE_FILE_DEFAULT_COUNTRY_MODULES_LIST' => '8.0',
      'CACHE_FILE_CUSTOMER_MODULES_LIST' => '8.0',
      'CACHE_FILE_MUST_HAVE_MODULES_LIST' => '8.0',
      'CACHE_FILE_TRUSTED_MODULES_LIST' => '8.0',
      'CACHE_FILE_UNTRUSTED_MODULES_LIST' => '8.0',
    ),
    'PhpEncryption' => 
    array (
      'LEGACY_ENGINE' => '8.0',
    ),
    'QuickAccess' => 
    array (
      'NEW_PRODUCT_LINK' => '9.0',
      'NEW_PRODUCT_V2_LINK' => '9.0',
    ),
    'Tab' => 
    array (
      'TAB_MODULE_LIST_URL' => '9.0',
    ),
    'Tools' => 
    array (
      'UNTRUSTED_URL_ALLOWED_SCHEMES' => '9.0',
      'SSRF_BLOCKED_IPV4_RANGES' => '9.0',
      'SSRF_BLOCKED_IPV6_RANGES' => '9.0',
      'SSRF_IPV4_IN_IPV6_RANGES' => '9.0',
    ),
    'Validate' => 
    array (
      'ADMIN_PASSWORD_LENGTH' => '9.0',
      'PASSWORD_LENGTH' => '9.0',
    ),
  ),
  'hooks' => 
  array (
    'actionadminlogincontrollerbefore' => 
    array (
      0 => 'actionAdminLoginControllerBefore',
      1 => '9.0',
    ),
    'actionadminlogincontrollerloginbefore' => 
    array (
      0 => 'actionAdminLoginControllerLoginBefore',
      1 => '9.0',
    ),
    'actionadminlogincontrollerloginafter' => 
    array (
      0 => 'actionAdminLoginControllerLoginAfter',
      1 => '9.0',
    ),
    'actionadminlogincontrollerforgotbefore' => 
    array (
      0 => 'actionAdminLoginControllerForgotBefore',
      1 => '9.0',
    ),
    'actionadminlogincontrollerforgotafter' => 
    array (
      0 => 'actionAdminLoginControllerForgotAfter',
      1 => '9.0',
    ),
    'actionadminlogincontrollerresetbefore' => 
    array (
      0 => 'actionAdminLoginControllerResetBefore',
      1 => '9.0',
    ),
    'actionadminlogincontrollerresetafter' => 
    array (
      0 => 'actionAdminLoginControllerResetAfter',
      1 => '9.0',
    ),
    'actionpaymentmoduleproductvartplafter' => 
    array (
      0 => 'actionPaymentModuleProductVarTplAfter',
      1 => '9.0',
    ),
    'displaycustomeraccounttop' => 
    array (
      0 => 'displayCustomerAccountTop',
      1 => '9.0',
    ),
    'actionbeforeenablemobilemodule' => 
    array (
      0 => 'actionBeforeEnableMobileModule',
      1 => '9.0',
    ),
    'actionbeforedisablemobilemodule' => 
    array (
      0 => 'actionBeforeDisableMobileModule',
      1 => '9.0',
    ),
    'actionajaxdiebefore' => 
    array (
      0 => 'actionAjaxDieBefore',
      1 => '9.0',
    ),
    'overrideimagelink' => 
    array (
      0 => 'overrideImageLink',
      1 => '9.0',
    ),
    'adaptimagelink' => 
    array (
      0 => 'adaptImageLink',
      1 => '9.0',
    ),
    'actionorderhasbeenshipped' => 
    array (
      0 => 'actionOrderHasBeenShipped',
      1 => '9.0',
    ),
    'actionorderhasbeendelivered' => 
    array (
      0 => 'actionOrderHasBeenDelivered',
      1 => '9.0',
    ),
  ),
  'extends' => 
  array (
    'AbstractAssetManager' => NULL,
    'AbstractCheckoutStep' => NULL,
    'AbstractForm' => NULL,
    'AbstractLogger' => NULL,
    'Access' => 'ObjectModel',
    'Address' => 'ObjectModel',
    'AddressChecksum' => NULL,
    'AddressController' => 'FrontController',
    'AddressFormat' => 'ObjectModel',
    'AddressValidator' => NULL,
    'AddressesController' => 'FrontController',
    'AdminAccessController' => 'AdminController',
    'AdminCarrierWizardController' => 'AdminController',
    'AdminCarriersController' => 'AdminController',
    'AdminCartRulesController' => 'AdminController',
    'AdminController' => 'Controller',
    'AdminCountriesController' => 'AdminController',
    'AdminCustomerThreadsController' => 'AdminController',
    'AdminDashboardController' => 'AdminController',
    'AdminGroupsController' => 'AdminController',
    'AdminImportController' => 'AdminController',
    'AdminModulesPositionsController' => 'AdminController',
    'AdminNotFoundController' => 'AdminController',
    'AdminPdfController' => 'AdminController',
    'AdminQuickAccessesController' => 'AdminController',
    'AdminReturnController' => 'AdminController',
    'AdminSearchConfController' => 'AdminController',
    'AdminSearchController' => 'AdminController',
    'AdminShopController' => 'AdminController',
    'AdminShopGroupController' => 'AdminController',
    'AdminShopUrlController' => 'AdminController',
    'AdminSpecificPriceRuleController' => 'AdminController',
    'AdminStatsController' => 'AdminStatsTabController',
    'AdminStatsTabController' => 'AdminController',
    'AdminStoresController' => 'AdminController',
    'AdminTabsController' => 'AdminController',
    'AdminTagsController' => 'AdminController',
    'AdminTaxRulesGroupController' => 'AdminController',
    'AdminTranslationsController' => 'AdminController',
    'Alias' => 'ObjectModel',
    'Attachment' => 'ObjectModel',
    'AttachmentController' => 'FrontController',
    'AttributeGroup' => 'ObjectModel',
    'AttributeGroupLang' => 'DataLang',
    'AttributeLang' => 'DataLang',
    'AuthController' => 'FrontController',
    'AverageTaxOfProductsTaxCalculator' => NULL,
    'BestSalesController' => 'ProductListingFrontController',
    'BoOrder' => 'PaymentModule',
    'CMS' => 'ObjectModel',
    'CMSCategory' => 'ObjectModel',
    'CMSRole' => 'ObjectModel',
    'CSV' => NULL,
    'Cache' => NULL,
    'CacheApc' => 'Cache',
    'CacheMemcache' => 'Cache',
    'CacheMemcached' => 'Cache',
    'CacheXcache' => 'Cache',
    'Carrier' => 'ObjectModel',
    'CarrierLang' => 'DataLang',
    'CarrierModule' => 'Module',
    'Cart' => 'ObjectModel',
    'CartChecksum' => NULL,
    'CartController' => 'FrontController',
    'CartRule' => 'ObjectModel',
    'Category' => 'ObjectModel',
    'CategoryController' => 'ProductListingFrontController',
    'CategoryLang' => 'DataLang',
    'CccReducer' => NULL,
    'ChangeCurrencyController' => 'FrontController',
    'Chart' => NULL,
    'CheckoutAddressesStep' => 'AbstractCheckoutStep',
    'CheckoutDeliveryStep' => 'AbstractCheckoutStep',
    'CheckoutPaymentStep' => 'AbstractCheckoutStep',
    'CheckoutPersonalInformationStep' => 'AbstractCheckoutStep',
    'CheckoutProcess' => NULL,
    'CheckoutSession' => NULL,
    'CheckoutStepInterface' => 'RenderableInterface',
    'ChecksumInterface' => NULL,
    'CmsCategoryLang' => 'DataLang',
    'CmsController' => 'FrontController',
    'Combination' => 'ObjectModel',
    'ConditionsToApproveFinder' => NULL,
    'Configuration' => 'ObjectModel',
    'ConfigurationKPI' => 'Configuration',
    'ConfigurationLang' => 'DataLang',
    'ConfigurationTest' => NULL,
    'Connection' => 'ObjectModel',
    'ConnectionsSource' => 'ObjectModel',
    'Contact' => 'ObjectModel',
    'ContactController' => 'FrontController',
    'ContactLang' => 'DataLang',
    'Context' => NULL,
    'Controller' => NULL,
    'Cookie' => NULL,
    'Country' => 'ObjectModel',
    'CssMinifier' => NULL,
    'Currency' => 'ObjectModel',
    'Curve' => NULL,
    'Customer' => 'ObjectModel',
    'CustomerAddress' => 'Address',
    'CustomerAddressForm' => 'AbstractForm',
    'CustomerAddressFormatter' => NULL,
    'CustomerAddressPersister' => NULL,
    'CustomerForm' => 'AbstractForm',
    'CustomerFormatter' => NULL,
    'CustomerLoginForm' => 'AbstractForm',
    'CustomerLoginFormatter' => NULL,
    'CustomerMessage' => 'ObjectModel',
    'CustomerPersister' => NULL,
    'CustomerSession' => 'ObjectModel',
    'CustomerThread' => 'ObjectModel',
    'Customization' => 'ObjectModel',
    'CustomizationField' => 'ObjectModel',
    'DataLang' => NULL,
    'DateRange' => 'ObjectModel',
    'Db' => NULL,
    'DbMySQLi' => 'Db',
    'DbPDO' => 'Db',
    'DbQuery' => NULL,
    'Delivery' => 'ObjectModel',
    'DeliveryOptionsFinder' => NULL,
    'DiscountController' => 'FrontController',
    'Dispatcher' => NULL,
    'DummyAdminController' => 'AdminController',
    'Employee' => 'ObjectModel',
    'EmployeeSession' => 'ObjectModel',
    'Feature' => 'ObjectModel',
    'FeatureFlag' => 'ObjectModel',
    'FeatureLang' => 'DataLang',
    'FeatureValue' => 'ObjectModel',
    'FeatureValueLang' => 'DataLang',
    'FileLogger' => 'AbstractLogger',
    'FormField' => NULL,
    'FormFormatterInterface' => NULL,
    'FormInterface' => 'RenderableInterface',
    'FrontController' => 'Controller',
    'Gender' => 'ObjectModel',
    'GenderLang' => 'DataLang',
    'GetFileController' => 'FrontController',
    'Group' => 'ObjectModel',
    'GroupLang' => 'DataLang',
    'GroupReduction' => 'ObjectModel',
    'Guest' => 'ObjectModel',
    'GuestTrackingController' => 'FrontController',
    'HTMLTemplate' => NULL,
    'HTMLTemplateDeliverySlip' => 'HTMLTemplate',
    'HTMLTemplateInvoice' => 'HTMLTemplate',
    'HTMLTemplateOrderReturn' => 'HTMLTemplate',
    'HTMLTemplateOrderSlip' => 'HTMLTemplateInvoice',
    'HTMLTemplateSupplyOrderForm' => 'HTMLTemplate',
    'Helper' => NULL,
    'HelperCalendar' => 'Helper',
    'HelperForm' => 'Helper',
    'HelperImageUploader' => 'HelperUploader',
    'HelperKpi' => 'Helper',
    'HelperKpiRow' => 'Helper',
    'HelperList' => 'Helper',
    'HelperOptions' => 'Helper',
    'HelperShop' => 'Helper',
    'HelperTreeCategories' => 'Tree',
    'HelperTreeShops' => 'Tree',
    'HelperUploader' => 'Uploader',
    'HelperView' => 'Helper',
    'HistoryController' => 'FrontController',
    'Hook' => 'ObjectModel',
    'ITreeToolbar' => NULL,
    'ITreeToolbarButton' => NULL,
    'IdentityController' => 'FrontController',
    'Image' => 'ObjectModel',
    'ImageManager' => NULL,
    'ImageType' => 'ObjectModel',
    'IndexController' => 'FrontController',
    'JavascriptManager' => 'AbstractAssetManager',
    'JsMinifier' => NULL,
    'Language' => 'ObjectModel',
    'LegacyCompilerPass' => NULL,
    'Link' => NULL,
    'LinkProxy' => NULL,
    'LocalizationPack' => NULL,
    'Mail' => 'ObjectModel',
    'Manufacturer' => 'ObjectModel',
    'ManufacturerAddress' => 'Address',
    'ManufacturerController' => 'ProductListingFrontController',
    'Media' => NULL,
    'Message' => 'ObjectModel',
    'Meta' => 'ObjectModel',
    'MetaLang' => 'DataLang',
    'Module' => NULL,
    'ModuleAdminController' => 'AdminController',
    'ModuleFrontController' => 'FrontController',
    'ModuleGraph' => 'Module',
    'ModuleGraphEngine' => 'Module',
    'ModuleGrid' => 'Module',
    'ModuleGridEngine' => 'Module',
    'MyAccountController' => 'FrontController',
    'NewProductsController' => 'ProductListingFrontController',
    'Notification' => NULL,
    'NullLogger' => 'AbstractLogger',
    'ObjectModel' => NULL,
    'Order' => 'ObjectModel',
    'OrderCarrier' => 'ObjectModel',
    'OrderCartRule' => 'ObjectModel',
    'OrderConfirmationController' => 'FrontController',
    'OrderController' => 'FrontController',
    'OrderDetail' => 'ObjectModel',
    'OrderDetailController' => 'FrontController',
    'OrderFollowController' => 'FrontController',
    'OrderHistory' => 'ObjectModel',
    'OrderInvoice' => 'ObjectModel',
    'OrderMessage' => 'ObjectModel',
    'OrderMessageLang' => 'DataLang',
    'OrderPayment' => 'ObjectModel',
    'OrderReturn' => 'ObjectModel',
    'OrderReturnController' => 'FrontController',
    'OrderReturnState' => 'ObjectModel',
    'OrderReturnStateLang' => 'DataLang',
    'OrderSlip' => 'ObjectModel',
    'OrderSlipController' => 'FrontController',
    'OrderState' => 'ObjectModel',
    'OrderStateLang' => 'DataLang',
    'PDF' => NULL,
    'PDFGenerator' => 'TCPDF',
    'PSRLoggerAdapter' => NULL,
    'Pack' => 'Product',
    'Page' => 'ObjectModel',
    'PageNotFoundController' => 'FrontController',
    'PasswordController' => 'FrontController',
    'PaymentFree' => 'PaymentModule',
    'PaymentModule' => 'Module',
    'PaymentOptionsFinder' => 'HookFinder',
    'PdfInvoiceController' => 'FrontController',
    'PdfOrderReturnController' => 'FrontController',
    'PdfOrderSlipController' => 'FrontController',
    'PhpEncryption' => NULL,
    'PhpEncryptionEngine' => NULL,
    'PrestaShopBackup' => NULL,
    'PrestaShopCollection' => NULL,
    'PrestaShopDatabaseException' => 'PrestaShopException',
    'PrestaShopException' => 'Exception',
    'PrestaShopLogger' => 'ObjectModel',
    'PrestaShopLoggerInterface' => NULL,
    'PrestaShopModuleException' => 'PrestaShopException',
    'PrestaShopObjectNotFoundException' => 'PrestaShopException',
    'PrestaShopPaymentException' => 'PrestaShopException',
    'PrestashopAssetsLibraries' => NULL,
    'PricesDropController' => 'ProductListingFrontController',
    'Product' => 'ObjectModel',
    'ProductAssembler' => NULL,
    'ProductAttribute' => 'ObjectModel',
    'ProductController' => 'ProductPresentingFrontController',
    'ProductDownload' => 'ObjectModel',
    'ProductListingFrontController' => 'ProductPresentingFrontController',
    'ProductPresenterFactory' => NULL,
    'ProductPresentingFrontController' => 'FrontController',
    'ProductSale' => NULL,
    'ProductSupplier' => 'ObjectModel',
    'Profile' => 'ObjectModel',
    'ProfileLang' => 'DataLang',
    'QuickAccess' => 'ObjectModel',
    'QuickAccessLang' => 'DataLang',
    'RangePrice' => 'ObjectModel',
    'RangeWeight' => 'ObjectModel',
    'RegistrationController' => 'FrontController',
    'RequestSql' => 'ObjectModel',
    'Risk' => 'ObjectModel',
    'RiskLang' => 'DataLang',
    'SQLUtils' => NULL,
    'Search' => NULL,
    'SearchController' => 'ProductListingFrontController',
    'SearchEngine' => 'ObjectModel',
    'Shop' => 'ObjectModel',
    'ShopGroup' => 'ObjectModel',
    'ShopUrl' => 'ObjectModel',
    'SitemapController' => 'FrontController',
    'SmartyCustom' => 'Smarty',
    'SmartyCustomTemplate' => 'Smarty_Internal_Template',
    'SmartyDev' => 'Smarty',
    'SmartyDevTemplate' => 'Smarty_Internal_Template',
    'SmartyLazyRegister' => NULL,
    'SmartyResourceModule' => 'Smarty_Resource_Custom',
    'SmartyResourceParent' => 'Smarty_Resource_Custom',
    'SpecificPrice' => 'ObjectModel',
    'SpecificPriceFormatter' => NULL,
    'SpecificPriceRule' => 'ObjectModel',
    'State' => 'ObjectModel',
    'StatisticsController' => 'FrontController',
    'Stock' => 'ObjectModel',
    'StockAvailable' => 'ObjectModel',
    'StockManager' => NULL,
    'StockManagerFactory' => NULL,
    'StockManagerInterface' => NULL,
    'StockManagerModule' => 'Module',
    'StockMvt' => 'ObjectModel',
    'StockMvtReason' => 'ObjectModel',
    'StockMvtReasonLang' => 'DataLang',
    'StockMvtWS' => 'ObjectModel',
    'Store' => 'ObjectModel',
    'StoresController' => 'FrontController',
    'StylesheetManager' => 'AbstractAssetManager',
    'Supplier' => 'ObjectModel',
    'SupplierAddress' => 'Address',
    'SupplierController' => 'ProductListingFrontController',
    'SupplyOrder' => 'ObjectModel',
    'SupplyOrderDetail' => 'ObjectModel',
    'SupplyOrderHistory' => 'ObjectModel',
    'SupplyOrderReceiptHistory' => 'ObjectModel',
    'SupplyOrderState' => 'ObjectModel',
    'SupplyOrderStateLang' => 'DataLang',
    'SymfonyConsoleLogger' => 'AbstractLogger',
    'Tab' => 'ObjectModel',
    'TabLang' => 'DataLang',
    'Tag' => 'ObjectModel',
    'Tax' => 'ObjectModel',
    'TaxCalculator' => NULL,
    'TaxConfiguration' => NULL,
    'TaxManagerFactory' => NULL,
    'TaxManagerInterface' => NULL,
    'TaxManagerModule' => 'Module',
    'TaxRule' => 'ObjectModel',
    'TaxRulesGroup' => 'ObjectModel',
    'TaxRulesTaxManager' => NULL,
    'TemplateFinder' => NULL,
    'ThemeLang' => 'DataLang',
    'Tools' => NULL,
    'Translate' => NULL,
    'TranslatedConfiguration' => 'Configuration',
    'Tree' => NULL,
    'TreeToolbar' => NULL,
    'TreeToolbarButton' => NULL,
    'TreeToolbarLink' => 'TreeToolbarButton',
    'TreeToolbarSearch' => 'TreeToolbarButton',
    'TreeToolbarSearchCategories' => 'TreeToolbarButton',
    'Upgrader' => NULL,
    'UploadController' => 'GetFileController',
    'Uploader' => NULL,
    'Validate' => NULL,
    'ValidateConstraintTranslator' => NULL,
    'Warehouse' => 'ObjectModel',
    'WarehouseAddress' => 'Address',
    'WarehouseProductLocation' => 'ObjectModel',
    'WebserviceException' => 'Exception',
    'WebserviceKey' => 'ObjectModel',
    'WebserviceOutputBuilder' => NULL,
    'WebserviceOutputInterface' => NULL,
    'WebserviceOutputJSON' => NULL,
    'WebserviceOutputXML' => NULL,
    'WebserviceRequest' => NULL,
    'WebserviceSpecificManagementAttachments' => NULL,
    'WebserviceSpecificManagementImages' => NULL,
    'WebserviceSpecificManagementInterface' => NULL,
    'WebserviceSpecificManagementSearch' => NULL,
    'Zone' => 'ObjectModel',
  ),
  'uniqueMethodNames' => 
  array (
    '_copynoneflag' => '_copyNoneFlag',
    '_getfilesize' => '_getFileSize',
    '_getformatdb' => '_getFormatDB',
    '_getpdo' => '_getPDO',
    '_getservervars' => '_getServerVars',
    '_ispresent' => '_isPresent',
    '_normalizedirectory' => '_normalizeDirectory',
    '_onstatuschange' => '_onStatusChange',
    '_setcookie' => '_setcookie',
    '_subtree' => '_subTree',
    '_updatecustomizationquantity' => '_updateCustomizationQuantity',
    'addattributecombinaison' => 'addAttributeCombinaison',
    'addattributecombinationmultiple' => 'addAttributeCombinationMultiple',
    'addcolorstoproductlist' => 'addColorsToProductList',
    'adddiscount' => 'addDiscount',
    'addextracarriers' => 'addExtraCarriers',
    'addjquery' => 'addJquery',
    'addmedia' => 'addMedia',
    'addmissingmvt' => 'addMissingMvt',
    'addonsrequest' => 'addonsRequest',
    'addpageheadertoolbarmoduleslistbutton' => 'addPageHeaderToolBarModulesListButton',
    'addproductattribute' => 'addProductAttribute',
    'addproductattributemultiple' => 'addProductAttributeMultiple',
    'addstockmvt' => 'addStockMvt',
    'addtoolbarmoduleslistbutton' => 'addToolBarModulesListButton',
    'ajaxdie' => 'ajaxDie',
    'ajaxprocessgetmodulequickview' => 'ajaxProcessGetModuleQuickView',
    'array_replace' => 'array_replace',
    'arrayreplacerecursive' => 'arrayReplaceRecursive',
    'ccccss' => 'cccCss',
    'cccjs' => 'cccJS',
    'checkdiscountvalidity' => 'checkDiscountValidity',
    'checkmodulefromaddonsapi' => 'checkModuleFromAddonsApi',
    'checkproductrestrictions' => 'checkProductRestrictions',
    'checkproductstock' => 'checkProductStock',
    'cleannonunicodesupport' => 'cleanNonUnicodeSupport',
    'clearcolorlistcache' => 'clearColorListCache',
    'containsproduct' => 'containsProduct',
    'copyfromuntrustedsource' => 'copyFromUntrustedSource',
    'copymodaddonsimg' => 'copyModAddonsImg',
    'createorderslip' => 'createOrderSlip',
    'deferinlinescripts' => 'deferInlineScripts',
    'deferscript' => 'deferScript',
    'deleteattributecombinaison' => 'deleteAttributeCombinaison',
    'deleteattributesimpacts' => 'deleteAttributesImpacts',
    'deletepicturetoproduct' => 'deletePictureToProduct',
    'deletetaxrulebyidcounty' => 'deleteTaxRuleByIdCounty',
    'deletetrustedxmlcache' => 'deleteTrustedXmlCache',
    'dependsonstock' => 'dependsOnStock',
    'display404error' => 'display404Error',
    'displayajaxgetblogrss' => 'displayAjaxGetBlogRss',
    'displayflags' => 'displayFlags',
    'displaymoduleoptions' => 'displayModuleOptions',
    'displaynumber' => 'displayNumber',
    'displayprice' => 'displayPrice',
    'encryptiv' => 'encryptIV',
    'fileslisttopaths' => 'filesListToPaths',
    'fillmoduledata' => 'fillModuleData',
    'filtertabmodulelist' => 'filterTabModuleList',
    'filtertranslationfiles' => 'filterTranslationFiles',
    'formatproductandvoucherforemail' => 'formatProductAndVoucherForEmail',
    'generatedeliveryslippdfbyidorder' => 'generateDeliverySlipPDFByIdOrder',
    'generateindex' => 'generateIndex',
    'generateinvoicepdfbyidorder' => 'generateInvoicePDFByIdOrder',
    'generatetrustedxml' => 'generateTrustedXml',
    'getadmintranslation' => 'getAdminTranslation',
    'getattributecombinaisons' => 'getAttributeCombinaisons',
    'getattributesimpacts' => 'getAttributesImpacts',
    'getbacktracklimit' => 'getBackTrackLimit',
    'getbrightness' => 'getBrightness',
    'getbyorderid' => 'getByOrderId',
    'getcarriernamefromshopname' => 'getCarrierNameFromShopName',
    'getcategoryinformations' => 'getCategoryInformations',
    'getcldr' => 'getCldr',
    'getcolorslistcacheid' => 'getColorsListCacheId',
    'getconversationrate' => 'getConversationRate',
    'getdeliveryaddresseswithoutcarriers' => 'getDeliveryAddressesWithoutCarriers',
    'getexentedmessage' => 'getExentedMessage',
    'getfieldsvalidate' => 'getFieldsValidate',
    'getformatedname' => 'getFormatedName',
    'getgenericadmintranslation' => 'getGenericAdminTranslation',
    'getgroupbycategoryid' => 'getGroupByCategoryId',
    'getgroupreductionbycategoryid' => 'getGroupReductionByCategoryId',
    'gethookaliaslist' => 'getHookAliasList',
    'getidproductattributesbyidattributes' => 'getIdProductAttributesByIdAttributes',
    'getinlinescript' => 'getInlineScript',
    'getinvoice' => 'getInvoice',
    'getjquerypath' => 'getJqueryPath',
    'getlanguagepacklistcontent' => 'getLanguagePackListContent',
    'getlastorderstate' => 'getLastOrderState',
    'getminimalproductordeclinationquantity' => 'getMinimalProductOrDeclinationQuantity',
    'getmoduleslist' => 'getModulesList',
    'getorderbycartid' => 'getOrderByCartId',
    'getorderidsbystatus' => 'getOrderIdsByStatus',
    'getordersidinvoicebydate' => 'getOrdersIdInvoiceByDate',
    'getpinnedresolveentry' => 'getPinnedResolveEntry',
    'getproducttaxrateviarules' => 'getProductTaxRateViaRules',
    'getretrohookname' => 'getRetroHookName',
    'getsafemodestatus' => 'getSafeModeStatus',
    'getstockmvts' => 'getStockMvts',
    'getstoresforxml' => 'getStoresForXml',
    'gettabbyidprofile' => 'getTabByIdProfile',
    'gettabmoduleslist' => 'getTabModulesList',
    'gettranslationsfields' => 'getTranslationsFields',
    'geturlrewriteinformation' => 'getUrlRewriteInformation',
    'geturlrewriteinformations' => 'getUrlRewriteInformations',
    'getwscurrentstate' => 'getWsCurrentState',
    'hascounties' => 'hasCounties',
    'hasoutboundproxy' => 'hasOutboundProxy',
    'hosttoascii' => 'hostToAscii',
    'initformfields' => 'initFormFields',
    'initmultistoreheader' => 'initMultistoreHeader',
    'inittabmodulelist' => 'initTabModuleList',
    'installemailslanguagepack' => 'installEmailsLanguagePack',
    'isanything' => 'isAnything',
    'isenabledformobiledevices' => 'isEnabledForMobileDevices',
    'isfresh' => 'isFresh',
    'ismoduletrusted' => 'isModuleTrusted',
    'ispasswd' => 'isPasswd',
    'ispasswdadmin' => 'isPasswdAdmin',
    'isplaintextpassword' => 'isPlaintextPassword',
    'ispublicip' => 'isPublicIp',
    'isuntrustedurlschemeallowed' => 'isUntrustedUrlSchemeAllowed',
    'jsondecode' => 'jsonDecode',
    'jsonencode' => 'jsonEncode',
    'link_rewrite' => 'link_rewrite',
    'maketranslationfields' => 'makeTranslationFields',
    'minifycss' => 'minifyCSS',
    'normalizeipforrangecheck' => 'normalizeIpForRangeCheck',
    'packedipinrange' => 'packedIpInRange',
    'packjs' => 'packJS',
    'pptags' => 'ppTags',
    'processstoreaddress' => 'processStoreAddress',
    'recursedeletedir' => 'recurseDeleteDir',
    'redirectlink' => 'redirectLink',
    'refresh' => 'refresh',
    'reinjectquantities' => 'reinjectQuantities',
    'removemedia' => 'removeMedia',
    'renderadmincategorietree' => 'renderAdminCategorieTree',
    'rendermoduleslist' => 'renderModulesList',
    'rendershoplist' => 'renderShopList',
    'replacebyabsoluteurl' => 'replaceByAbsoluteURL',
    'replacezerobyshopname' => 'replaceZeroByShopName',
    'resolvepublicips' => 'resolvePublicIps',
    'safepostvars' => 'safePostVars',
    'searchbynameandparentcmscategoryid' => 'searchByNameAndParentCMSCategoryId',
    'setdefinitionretrocompatibility' => 'setDefinitionRetrocompatibility',
    'setdeprecatedmedia' => 'setDeprecatedMedia',
    'setpriorities' => 'setPriorities',
    'setproductdependsonstock' => 'setProductDependsOnStock',
    'simulatecarriersoutput' => 'simulateCarriersOutput',
    'smartypostprocesstranslation' => 'smartyPostProcessTranslation',
    'stripslashes' => 'stripslashes',
    'submitexportlang' => 'submitExportLang',
    'submitimportlang' => 'submitImportLang',
    'supplyordersdetailsimportone' => 'supplyOrdersDetailsImportOne',
    'supplyordersimportone' => 'supplyOrdersImportOne',
    'updateproductattribute' => 'updateProductAttribute',
    'updatequantityproductwithattributequantity' => 'updateQuantityProductWithAttributeQuantity',
    'usemobiletheme' => 'useMobileTheme',
  ),
);
