Go Simple HTTP Server

```go
package main

import (
	"fmt"
	"net/http"
)

func main() {
	http.HandleFunc("/", HelloWorld)
	http.ListenAndServe(":5000", nil)
}

func HelloWorld(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "<h1>It works!</h1>")
}
```
