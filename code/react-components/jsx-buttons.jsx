export default function Buton({
  children,
  button = false,
  target = false,
  ahref = false,
  href = undefined,
}) {
  return button ? (
    <button type='button'>{children}</button>
  ) : ahref && href ? (
    !target ? (
      <a href={href}>{children}</a>
    ) : (
      <a href={href}>{children}</a>
    )
  ) : null
}
