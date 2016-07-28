# github-markdown-parser.php

Usage:

```http
http://md.paratte.ch/github-markdown-parser.php?urlmd=<urlmd>&return=<return>&filename=<filename>&markdown=<markdown>
```

> `<urlmd>` loads a _markdown_ file and _HTML_ encodes it.

> `<return>` value controls which parts of the _markdown_ contents are returned.
Possible values are: `all|begin|content|end`.

> `<filename>` text is written in title of the _markdown_ content.

> `<markdown>` text is parsed as _markdown_ content and _HTML_ encoded.

Fonction: This _HTML_ page parses the _markdown_ content and returns it as _HTML_ encoded.

Note: Arguments can be sent by `GET` or `POST` method.
`GET` method is prioritized over `POST`.
`POST` method is mandatory for long _markdown_ content.



# github-markdown-viewer.php

Usage:

```http
http://md.paratte.ch/github-markdown-viewer.php
```

Fonction: This _HTML_ page asks for a _markdown_ filename and displays it.

Note: Due to _JavaScript_ security restrictions, the _HTML_ page can't receive the _filename_ argument.