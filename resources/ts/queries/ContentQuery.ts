import { useQuery } from 'react-query'
import axios from 'axios'
import { Content } from '../types/Content'

const { data: contents, status } = useQuery('contents', async () => {
  const { data } = await axios.get<Content[]>('api/contents')
  return data
})
