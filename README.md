## Morph Routing Bundle

### Add Router Provider
To add your routes you need to create route provider which implement 
`WideMorph\Morph\Bundle\MorphRoutingBundle\Interaction\Contract\RouterProviderInterface` interface
* `getRouteCollection()` - Should return `Symfony\Component\Routing\RouteCollection` with your routes.
