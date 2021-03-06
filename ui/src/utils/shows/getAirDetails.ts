import parseStandardTime from '~/utils/date/parseStandardTime'

/**
 * For series, display range (2018-2019). For movies, display air date (2018)
 */
export default function getAirDetails(show: AppShow): string {
  const start: number = parseStandardTime(show.air_start).getFullYear()

  if (show.title_type === 'series') {
    if (show.air_end == null) {
      return `${start}-?`
    }
    const end: number = parseStandardTime(show.air_end).getFullYear()
    return `${start}-${end}`
  }

  return String(start)
}