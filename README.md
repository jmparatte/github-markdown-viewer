# github-markdown-parser.php

Usage:

```http
http://md.paratte.ch/github-markdown-parser.php?urlmd=<urlmd>&return=<return>&title=<title>&markdown=<markdown>
```

> `<urlmd>` gets a _markdown_ file and _HTML_ encodes it.
See also `<markdown>` argument.

> `<return>` controls which parts are returned.
Possible values are: `all|begin|content|end`.

> `<title>` is written at top of the _markdown_ content.

> `<markdown>` text is parsed as _markdown_ content and _HTML_ encoded.

Fonction: This _HTML_ page parses a _markdown_ content and returns it as an _HTML_ encoded content.

Note 1: Arguments can be sent by `GET` or `POST` method.
`GET` method is prioritized over `POST`.
`POST` method is mandatory for long _markdown_ content.

Note 2: `<urlmd>` argument is prioritized over `<markdown>` argument.



# github-markdown-viewer.php

Usage:

```http
http://md.paratte.ch/github-markdown-viewer.php
```

Fonction: This _HTML_ page asks for a local _markdown_ filename content and displays it.

Note: Due to _JavaScript_ security restrictions, _HTML_ pages can't open any files other than of `<input type="file"...>` elements.