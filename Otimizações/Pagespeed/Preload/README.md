# Preload

 **Descrição**  
O preload é uma forma de pré-carregamento de recursos como imagens, scripts, folhas de estilo e outros elementos que serão necessários para exibir o conteúdo da página. Esses recursos serão carregados primeiros, normalmente usamos essa técnicas nas imagens iniciais por questões de Pagespeed.

O código deve ser inserido no head

## HTML
```
<link rel="preload" href="caminhoDaImagemMobile" fetchPriority="high"  as="image" media=" (max-width:768px)">
<link rel="preload" href="caminhoDaImagemDesktop" fetchPriority="high" as="image" media=" (min-width:768px)">
```
## CSS
```
```
## JavaScript
```
```
## PHP
```
```
